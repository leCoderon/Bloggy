@extends('./layout/default')
@section('title')
    Bloggy | homepage
@endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('./defaultAssets/assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Bloggy</h1>
                        <span class="subheading">Share content and let's enjoy together</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">

                @forelse ($articles as $article)
                    <!-- Post preview-->
                <div class="post-preview">
                    <a href="{{route('article.show', $article->id)}}">
                        <h2 class="post-title">{{$article->title}}</h2>
                        <h3 class="post-subtitle">{{$article->sub_title}}</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">{{$article->author->name}}</a>
                        on {{$article->created_at}}
                    </p>
                </div>

                <!-- Divider-->
                <hr class="my-4" />
                @empty
                    <div class="alert alert-info">
                        <p>Aucun contenu posté pour l'instant</p>
                    </div>
                @endforelse
                {{ $articles->links() }}
                
                
                
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="{{route('articles.index')}}">Older
                        Posts →</a></div>
            </div>
        </div>
    </div>
@endsection
