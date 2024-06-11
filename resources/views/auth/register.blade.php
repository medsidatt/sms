@extends('layouts.formular')
@section('content')
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">NiceAdmin</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Créer un compte</h5>
                                    <p class="text-center small">Entrez vos informations personnelles pour créer un compte</p>
                                </div>

                                <form class="row g-3" action="{{ route('register') }}" method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourFirstName" class="form-label">Ton prénom</label>
                                        <input type="text"
                                               name="first_name"
                                               value="{{ old('first_name') }}"
                                               class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
{{--                                               class="form-control @error('first_name') is-invalid @enderror"--}}
                                               id="yourFirstName">
                                        @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="yourLastName" class="form-label">Votre nom</label>
                                        <input type="text" name="last_name"
                                               value="{{ old('last_name') }}"
                                               class="form-control @error('last_name') is-invalid @enderror" id="yourLastName">
                                        @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}!</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Votre e-mail</label>
                                        <input type="email" name="email"
                                               value="{{ old('email') }}"
                                               class="form-control @error('email') is-invalid @enderror" id="yourEmail">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}!</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="username"
                                                   value="{{ old('username') }}"
                                                   class="form-control @error('username') is-invalid @enderror" id="yourUsername">
                                            @error('username')
                                            <div class="invalid-feedback">{{ $message }}!</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password"
                                               value="{{ old('password') }}"
                                               class="form-control @error('password') is-invalid @enderror" id="yourPassword">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}!</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Créer un compte</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Vous avez déjà un compte? <a href="{{ route('login') }}">Se connecter</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
