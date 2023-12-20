@extends('./layout/default')
@section('title')
    Bloggy | Register
@endsection

@section('content')
    <!-- Main Content-->
    <br>
    <br>
    <br>
    <div class="container p-5 my-5">

        <div class="row justify-content-center  align-items-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="text-center">Enregistrer un nouvel article</h1>
                <br>
                <form action="{{ route('article.update', $article->id) }}" method="POST">
                    @method('post')
                    @csrf
                    
                    <!-- name input -->
                    <div class="form-outline mb-4">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <x-forms.input type="text" name="title" placeholder="Entrez un titre" label="titre de l'article"/>

                        <input type="text" id="title" name="title" class="form-control" value="{{ $article->title }}"
                            placeholder="Entre votre nom" required />
                        <label class="form-label" for="title">titre de l'article</label>
                    </div>
                    <!-- name input -->
                    <div class="form-outline mb-4">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" id="title" name="sub_title" class="form-control" value="{{ $article->title }}"
                            placeholder="Entre votre nom" required />
                        <label class="form-label" for="title">Sous titre de l'article</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <textarea class="form-control" name="content" id="content" cols="20" rows="10">{{ $article->content }}</textarea>
                        <label class="form-label" for="content">Contenu de l'article</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-start">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" name="online" type="hidden" value="0" />
                                <input class="form-check-input" name="online" type="checkbox" value="1" id="online" checked />
                                <label class="form-check-label" for="online">Mettre en ligne</label>
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
