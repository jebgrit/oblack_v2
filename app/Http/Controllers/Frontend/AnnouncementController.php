<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AnnonceView;
use App\Models\Announcement;
use App\Models\Gallery;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class AnnouncementController extends Controller
{
    # Add
    public function submit()
    {
        return view('frontend.announcement.submit');
    }


    # Store
    public function store(Request $request)
    {
        // dd($request);

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'max:50'],
            'description' => ['required', 'max:15000'],
            'size' => ['nullable'],
            'color' => ['nullable'],
            'type' => ['nullable'],
            'categorie' => ['required'],
            'brand' => ['nullable'],
            'state' => ['required'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:1024'],

        ], [
            'title.required' => 'Ce champ est requis',
            'title.max' => '50 caractères maximums',
            'description.required' => 'Ce champ est requis',
            'description.max' => '15000 caractères maximums',
            'categorie.required' => 'Ce champ est requis',
            'state.required' => 'Ce champ est requis',
            'photo.required' => 'Ce champ est requis',
            'photo.image' => 'Uniquement des images',
            'photo.max' => 'Le poids ne doit pas dépasser 1 Mo',
        ]);




        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();
        } else {

            $photo = $request->file('photo');
            $photoname = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(440, 330)->save('upload/annonce/photo/' . $photoname);
            $save_url = 'upload/annonce/photo/' . $photoname;



            $an_id = Announcement::insertGetId([
                'user_id' => $request->user_id,
                'an_title' => $request->title,
                'an_description' => $request->description,
                'slug' => strtolower(str_replace(' ', '-', $request->title)),
                'an_size' => $request->size,
                'an_type' => $request->type,
                'an_color' => $request->color,
                'an_categorie' => $request->categorie,
                'an_brand' => $request->brand,
                'an_state' => $request->state,
                'an_photo' => $save_url,
                'created_at' => Carbon::now(),
            ]);


            # Image store
            $images = $request->file('image');
            foreach ($images as $img) {

                $request->validate([
                    'image.*' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
                ]);

                $imagename = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
                Image::make($img)->resize(800, 800)->save('upload/annonce/image/' . $imagename);
                $upload_path = 'upload/annonce/image/' . $imagename;

                Gallery::insert([
                    'announcement_id' => $an_id,
                    'url' => $upload_path,
                    'created_at' => Carbon::now(),
                ]);
            }


            $notification = array(
                'message' => 'Article ajouté avec succès',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }






    # Sort 
    public function sort(Request $request)
    {
        $sortOption = $request->input('sort_option');
        $annonce = Announcement::all();

        if ($sortOption === "desc") {
            $annonce = $annonce->sortByDesc('created_at');
        } else if ($sortOption === "asc") {
            $annonce = $annonce->sortBy('created_at');
        }

        return response()->json($annonce);
    }


    # Détails 
    public function details($id, $slug, Request $request)
    {
        $annonce = Announcement::findOrFail($id);
        $galerie = Gallery::where('announcement_id', $id)->get();

        # Count views for this annonce
        # Dans ce code, nous utilisons la méthode Auth::check() pour vérifier si l'utilisateur est connecté. 
        # Si l'utilisateur est connecté et qu'il n'a pas publié l'annonce, nous obtenons son adresse IP à l'aide 
        # de $request->ip() et vérifions si une vue enregistrée avec cette adresse IP existe déjà pour cette annonce. 
        # Si aucune vue n'a été trouvée, nous enregistrons une nouvelle vue avec cette adresse IP.

        if (Auth::check() && Auth::user()->id != $annonce->user_id) {
            $ipAddress = $request->ip();

            $existingView = AnnonceView::where('announcement_id', $annonce->id)
                ->where('ip_address', $ipAddress)
                ->first();

            if (!$existingView) {
                $annonce_view = new AnnonceView();
                $annonce_view->ip_address = $ipAddress;
                $annonce_view->announcement_id = $annonce->id;
                $annonce_view->save();
            }
        }


        return view('frontend.announcement.show', compact('annonce', 'galerie'));
    }


    # My annonce
    public function myannonce()
    {
        $id = Auth::user()->id;
        $myannonce = Announcement::where('user_id', $id)->latest()->paginate(10);

        return view('frontend.dashboard.myannonce', compact('myannonce'));
    }




    # Delete
    public function delete($id)
    {
        Announcement::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Annonce supprimé avec succès',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
