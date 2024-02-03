@extends('./layout/default')
@section('title')
    Bloggy | Register
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
                <h1 class="text-center">Rejoindre les créateur sur Bloggy</h1>
                <br>
                <form action="{{ route('register') }}" method="POST">
                    @method('post')
                    @csrf
                    {{-- name input --}}
                    <div class="form-outline mb-4">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <x-forms.input type="text" value="" name="name" placeholder="Entrez votre nom"
                            label="Votre nom" />
                    </div>


                    {{-- Email input --}}
                    <div class="form-outline mb-4">
                        @error('email')
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



                    {{-- Submit button --}}
                    <button type="submit" class="btn btn-primary  mb-4">Créer votre compte</button>

                    {{-- Register buttons --}}
                    <div class="text-center">
                        <p>Déja un compte? <a href="{{ route('login') }}">connetez-vous</a></p>
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
