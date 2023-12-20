@extends('./layout/default')
@section('title')
    Bloggy | Register
@endsection

@section('content')
    <!-- Main Content-->
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-12  px-5 d-flex">
            <p class="me-4"><a href="{{ route('homepage') }}" class="text-success text-decoration-none "><i class="bi bi-caret-left"></i> Tous
                    les articles</a></p>
            <p><a href="{{ route('dashboard') }}" class="text-decoration-none "> Mes articles</a></p>
        </div>
    </div>
    <div class="container p-5 my-5">
        <div class="row justify-content-center  align-items-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="text-center">Enregistrer un nouvel article</h1>
                <br>
                <form action="{{ route('article.store') }}" method="POST">
                    @method('post')
                    @csrf
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                    <!-- Title input -->
                    <div class="form-outline mb-4">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <x-forms.input type="text" name="title" placeholder="Entrez un titre" label="titre de l'article"/>
                       
                    </div>
                    <!-- subTitle input -->
                    <div class="form-outline mb-4">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <x-forms.input type="text" name="sub_title" placeholder="Entrez un sous titre" label="Sous titre de l'article"/>

                       
                    </div>

                    <!-- Content input -->
                    <div class="form-outline mb-4">
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <x-forms.input type="textarea" name="content" placeholder="Entrez un contenu" label="Contenu de l'article"/>                      
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-start">
                            <!-- Checkbox -->
                            <div class="form-check">
                        <x-forms.input type="checkbox" name="online" label="Mettre en ligne" placeholder="" />                      
                            </div>
                        </div>


                    </div>


                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary  mb-4">Enregistrez</button>

                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
