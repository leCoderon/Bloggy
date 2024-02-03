@extends('./layout/default')
@section('title')
    Bloggy | Login
@endsection

@section('content')
    {{-- Main Content --}}
    <br>
    <br>
    <br>
    <div class="container p-5 my-5">

        <div class="row justify-content-center  align-items-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="text-center">Connectez-vous !</h1>
                <br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @method('post')
                    {{-- @if (session()->has('fail'))
                        <div class="alert alert-danger">{{ session()->get('fail') }}</div>
                    @endif --}}

                  

                    {{-- Email input --}}
                    <div class="form-outline mb-4">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <x-forms.input type="email" value="" name="email" placeholder="Entrez votre email"
                            label="Adresse email" />

                    </div>

                    {{-- Password input --}}
                    <div class="form-outline mb-4">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <x-forms.input type="password" value="" name="password" placeholder="Entrez votre password"
                            label="Mot de passe" />

                    </div>

                    {{-- 2 column grid layout for inline styling --}}
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            {{-- Checkbox --}}
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form2Example31"
                                    checked />
                                <label class="form-check-label" for="form2Example31"> Se souvenir de moi</label>
                            </div>
                        </div>

                        <div class="col">
                            {{-- Simple link --}}
                            <a href="#!">Mot de passe oublié?</a>
                        </div>
                    </div>

                    {{-- Submit button --}}
                    <button type="submit" class="btn btn-primary btn-block mb-4">Se Connecter</button>

                    {{-- Register buttons --}}
                    <div class="text-center">
                        <p>Pas encore de compte? <a href="{{ route('register') }}">Inscrivez-vous</a></p>
                        <p>ou connectez-vous avec:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
