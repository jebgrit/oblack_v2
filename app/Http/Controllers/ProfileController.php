<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfileController extends Controller
{

    # Profile
    public function profile()
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        return view('frontend.dashboard.profile', compact('data'));
    }


    # Update profile
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'max:100'],
            'short_info' => ['nullable', 'max:200'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:1024'],
        ], [
            'name.required' => 'Ce champ est requis',
            'name.max' => 'Le nom de l\'enseigne doit avoir 100 caractères maximums',

            'email.required' => 'Ce champ est requis',
            'email.email' => 'Le format de l\'email est invalide',
            'email.max' => 'L\'email doit avoir 100 caractères maximums',

            'phone.required' => 'Ce champ est requis',
            'phone.numeric' => 'Vous devez saisir uniquement des chiffres sans espaces',

            'address.required' => 'Ce champ est requis',
            'address.max' => 'Le mot de passe doit avoir 30 caractères maximums',

            'short_info.max' => 'Votre bio doit avoir 200 caractère maximums',

            'photo.image' => 'Format acceptés: jpeg, png ou jpg',
            'photo.max' => 'L\'image doit peser 1 méga octet au maximum',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
        } else {

            $id = Auth::user()->id;
            $data = User::find($id);

            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->short_info = $request->info;
            $data->updated_at = Carbon::now();

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                @unlink(public_path('upload/autre/' . $data->photo)); #to replace previous photo in folder by new one
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/autre'), $filename);
                $data->photo = $filename;
            }

            $data->save();

            return response()->json([
                'status' => 200,
                'messages' => 'Profile mis à jour avec succès!',
                [
                    'name' => $data->name,
                    'email' => $data->email,
                    'phone' => $data->phone,
                    'address' => $data->address,
                    'short_info' => $data->short_info,
                ]
            ]);
        }
    }



    # Update passwrd
    public function updatePasswrd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ], [
            'old_password.required' => 'Ce champ est requis',
            'password.required' => 'Ce champ est requis',
            'password.confirmed' => 'L\'ancien mot de passe est incorrect',
            'password.min' => 'Le mot de passe doit avoir 6 caractères minimums',
            'password_confirmation.required' => 'Ce champ est requis',
            'password_confirmation.min' => 'Le mot de passe doit avoir 6 caractères minimums',
            'password_confirmation.same' => 'Le mot de passe ne correspond pas au précédent',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 400,
                'messages' => $validator->getMessageBag()
            ]);
            // return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(auth()->user()->id);

        if (!Hash::check($request->old_password, $user->password)) {

            return response()->json([
                'status' => 401,
                'messages' => 'L\'ancien mot de passe est incorrect'
            ]);
            // return redirect()->back()->with('error', 'L\'ancien mot de passe est incorrect');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 200,
            'messages' => 'Mot de passe mis à jour avec succès'
        ]);

        // return redirect()->back()->with('success', 'Mot de passe mis à jour avec succès');
    }




    # Chat
    public function chat(): View
    {
        return view('frontend.dashboard.chat');
    }






    # Delete account
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
