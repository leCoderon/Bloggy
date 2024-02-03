@extends('./layout/default')
@section('title')
Bloggy | {{ $article->title }}
@endsection

@section('content')
<header class="masthead" style="background-image: url('../defaultAssets/assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $article->title }}</h1>
                    <h2 class="subheading">{{ $article->sub_title }}</h2>
                    <div class="d-flex align-items-center post-meta">
                        <img src="{{ $article->author->avatar ? asset('../storage/avatars/' . $article->author->avatar) : '../default-avatar.png' }}"
                            id="post_image" alt="">
                        <div class="ms-3">
                            <a href="#!" class="text-white">{{ $article->author->name }}</a><br>
                            {{ $article->created_at }}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
{{-- Post Content--}}
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                {!! $article->content !!}
            </div>
        </div>
    </div>
</article>

<div class="container">
    <div class="row">
        {{-- Divider--}}
        <hr class="my-4" />

        {{-- Modal pour poster des commentaires --}}
        <div class="d-flex  align-items-center justify-content-start">
            <a class="me-5" href="#" data-bs-toggle="modal" data-bs-target="#createCommentModal"><i
                    class="bi bi-chat-dots"></i></a>
            @include('comments.create_modal')

            {{-- Afficher le nombre de likes --}}
            <div id="like-section d-flex">
                <span id="likes-count">{{ $article->likes }} Likes</span>
                {{-- Bouton de like --}}
                <form id="like-form" data-article-id="{{ $article->id }}">
                    @csrf
                    <button type="submit">
                        @if (auth()->user() &&
                        auth()->user()->likedArticles->contains($article->id))
                        <i class="bi bi-hand-thumbs-down"></i>
                        @else
                        <i class="bi bi-hand-thumbs-up"></i>
                        @endif
                    </button>
                </form>
            </div>
            {{-- Fin Afficher le nombre de likes --}}
        </div>
        {{-- Fin Modal pour poster des commentaires --}}

        {{-- Divider--}}
        <hr class="my-4" />
        <h5 class="mb-4">Réponses</h5>


        {{-- Affichage des messages d'erreur ou success --}}
        @error('article_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('comment')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
       
        {{-- Fin Affichage des messages d'erreur ou success --}}



        <div class="col-md-12"></div>

        {{-- Affichage des commentaires dans la vue de l'article --}}
        <div class="col-12 col-md-8">
            @foreach ($article->comments()->latest()->get() as $comment)
            <div class="mb-5">
                {{-- Informations sur l'utilisateur --}}
                <div class="d-flex align-items-center post-meta mb-3">
                    <img src="{{ $comment->user->avatar ? asset('../storage/avatars/' . $comment->user->avatar) : '../default-avatar.png' }}"
                        id="avatar_menu" alt="">
                    <div class="ms-3">
                        <a href="#!" class="t">{{ $comment->user->name }}</a><br>
                        {{ $comment->created_at }}

                    </div>
                </div>
                {{-- Affichage du Commentaire  --}}
                <div class="card p-2 px-4 border-end-0 ">
                    <div class="d-flex justify-content-between align-items-center">
                        <p>{{ $comment->comment }}</p>

                        {{-- Modification et suppression des commentaires postés --}}
                        @can('update', $comment)
                        {{-- Vérification pour la modification du commentaire--}}
                        @can('delete', $comment)
                        {{-- Vérification pour la suppression du commentaire --}}

                        <div class="btn-group dropstart">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                ...
                            </a>
                            <ul class="dropdown-menu">
                                {{-- Modification du commentaire--}}
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#editCommentModal{{ $comment->id }}">Modifier</a></li>
                                {{-- Fin Modification du commentaire--}}

                                {{-- Suppression du commentaire--}}
                                <li>
                                    <form action="{{ route('comments.delete', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-white ps-3">Supprimer</button>
                                    </form>
                                </li>
                                {{-- Fin Suppression du commentaire--}}

                            </ul>
                        </div>
                        @endcan
                        {{-- Fin Vérification pour la modification du commentaire--}}
                        @endcan
                        {{-- Fin Vérification pour la suppression du commentaire--}}

                        {{-- Fin Modification et suppression des commentaires postés  --}}

                        {{-- Modal pour modifier et supprimer le commentaire --}}
                        @include('comments.edit_modal', ['comment' => $comment])
                    </div>

                    {{-- Modal pour répondre aux commentaire --}}
                    <a class="me-5" href="#" data-bs-toggle="modal"
                        data-bs-target="#createCommentReplyModal">Répondre</a>
                    @include('commentReply.create_modal')
                    {{-- Fin Modal pour répondre aux commentaire --}}

                </div>
                {{-- Fin Affichage du Commentaire  --}}


                {{-- Affichage des Réponse aux commentaires --}}
                <div class="card p-2 ms-5 border-end-0">
                    @foreach ($comment->replies as $reply)
                    <div class="p-4">
                        {{-- Informations sur l'utilisateur --}}
                        <div class="d-flex align-items-center post-meta mb-3">
                            <img src="{{ $reply->user->avatar ? asset('../storage/avatars/' . $reply->user->avatar) : '../default-avatar.png' }}"
                                id="avatar_menu" alt="">
                            <div class="ms-3">
                                <a href="#!" class="t">{{ $reply->user->name }}</a><br>
                                {{ $reply->created_at }}

                            </div>
                        </div>
                {{-- Fin Affichage des Réponse aux commentaires --}}
                <div class="card p-2 px-4 border-end-0">
                            <div class="d-flex justify-content-between align-items-center">

                                <p>{{ $reply->content }} </p>

                                {{-- Modification et suppression des réponses aux commentaires postés --}}
                                <div>
                                    @can('update', $reply)
                                    {{-- Vérification pour la modification --}}
                                    @can('delete', $reply)
                                    {{-- Vérification pour la suppression --}}

                                    <div class="btn-group dropstart">
                                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                            ...
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#editCommentReolyModal{{ $reply->id }}">Modifier</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('comment-replies.delete', $reply->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="border-0 bg-white ps-3">Supprimer</button>

                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    @endcan
                                    @endcan

                                    {{-- Modal pour modifier le commentaire --}}
                                    @include('commentReply.edit_modal', ['reply' => $reply])
                                </div>
                                {{-- Fin Modification et suppression des réponses aux commentaires postés --}}
                            </div>
                            {{-- Formulaire pour répondre aux réponse des commentaires --}}
                            <a class="" href="#" data-bs-toggle="modal"
                                data-bs-target="#createCommentReplyModal">Répondre</a>
                            @include('commentReply.create_modal')
                            {{-- Fin du formulaire --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection