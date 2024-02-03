@extends('./layout/default')
@section('title')
    Bloggy | Register
@endsection

@section('content')
    {{-- Main Content--}}
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
                    
                    {{-- name input --}}
                    <div class="form-outline mb-4">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <x-forms.input type="text" value="{{ $article->title ? $article->title : old($name) }}" name="title" placeholder="Entrez un titre" label="titre de l'article"/>

                    </div>
                    {{-- name input --}}
                    <div class="form-outline mb-4">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <x-forms.input type="text" value="{{ $article->sub_title ? $article->sub_title : old($name) }}" name="sub_title" placeholder="Entrez un sous titre" label="Sous titre de l'article"/>

                        </div>

                    {{-- Email input --}}
                    <div class="form-outline mb-4">
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <x-forms.input type="textarea" value="{{ $article->content ? $article->content : old($name) }}" name="content" placeholder="Entrez un Contenu" label="Contenu de l'article"/>

                       
                    </div>

                    {{-- 2 column grid layout for inline styling --}}
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-start">
                            {{-- Checkbox --}}
                            
                            <div class="form-check">
                                <x-forms.input type="checkbox" value="" name="online" placeholder="" label="Mettre en ligne"/>
                                
                            </div>
                        </div>


                    </div>


                    {{-- Submit button --}}
                    <button type="submit" class="btn btn-primary  mb-4">Enregistrez</button>

                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    {{-- TyinyMce --}}
    <script src="https://cdn.tiny.cloud/1/li92nzn8r5bu3v7esf01v78ii06i47m98h9vqji25xi6itrh/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
          toolbar: 'image undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
          automatic_uploads: true,   
          images_upload_url: '/upload', // L'URL où les images seront téléchargées
           images_upload_base_path: '{{ asset('/') }}', // Le chemin de base pour le stockage des images
           content: {!! json_encode($article->content) !!} // Chargez le contenu initial depuis le modèle
      
        });
      </script>
@endsection
