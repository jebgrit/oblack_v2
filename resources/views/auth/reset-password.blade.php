{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}




@extends('frontend.master')

@section('main')

    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Accueil</a></li>
            <li class="active">Inscription</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->

    <div class="container">
        <header><h1>S'inscrire</h1></header>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    
                <form role="form" id="form-create-account" method="POST" action="{{ route('password.store') }}" >
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">


                    <!-- Email Address -->
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
                        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Mot de passe:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation">Confirmer mot de passe:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        @error('password_confirmation')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group clearfix">
                        <button type="submit" class="btn pull-right btn-default" id="account-submit">Réinitialiser le mot de passe</button>
                    </div>

                </form>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->

@endsection
