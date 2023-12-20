
@extends('./layout/default')
@section('title')
    Bloggy | {{$article->title}}
@endsection

@section('content')
        <header class="masthead" style="background-image: url('../defaultAssets/assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>{{$article->title}}</h1>
                            <h2 class="subheading">{{$article->sub_title}}</h2>
                            <span class="meta">
                                Posté par
                                <a href="#!">{{$article->author->name}}</a>
                                le {{$article->created_at}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        
                        {!!$article->content!!} 
                    </div>
                </div>
            </div>
        </article>
@endsection
       