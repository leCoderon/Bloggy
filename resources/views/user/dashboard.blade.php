@extends('./layout/default')
@section('title')
    Bloggy | Dashboard
@endsection

@section('content')
    {{-- Main Content --}}
    <br>
    <br>
    <br>
    <div class="container  p-5 p-md-1 my-5">
        <div class="row">
            <div class="col-12">
                <h1>Tableau de bord</h1>
                {{-- Divider --}}
                <hr class="my-4" />
            </div>
        </div>
        <div class="row justify-content-center  align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h3>Vos article</h3>
                    <a href="{{ route('article.new') }}" class="btn btn-success">Nouvel article <i class="bi bi-plus"></i></a>
                </div>
            </div>
            <div class="col-12 mt-5">


                @if (sizeof($myArticle) === 0)
                    <div class="alert alert-info">Vous n'avez pas encore créé d'articles.</div>
                @else
                    <div class="d-flex justify-content-center"> {{ $myArticle->links() }}
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-1">#Id</th>
                                <th class="col-1">Status</th>
                                <th class="col-3">title</th>
                                <th class="col-4">Sous titre</th>
                                <th class="col-3">Actions</th>
                            </tr>
                        </thead>
                        @foreach ($myArticle as $article)
                            <tbody class="">
                                <tr>
                                    <th>{{ $article->id }}</th>
                                    <th>
                                        @if ($article->online === 1)
                                            <p class="text-success">Online</p>
                                        @else
                                            <p class="text-primary">Offline</p>
                                        @endif
                                    </th>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->sub_title }}</td>
                                    <td><a href="{{ route('article.edit', $article->id) }}" class="btn btn-info"><i
                                                class="bi bi-pen"></i> Modifier</a>
                                        <a href="{{ route('article.delete', $article->id) }}" class="btn btn-danger"><i
                                                onclick="alert('ête vous sûr de supprimer cet article')"
                                                class="bi bi-trash"></i> Delete</a>
                                    </td>
                                </tr>

                            </tbody>
                        @endforeach

                    </table>
                @endif

                <div class="d-flex justify-content-center"> {{ $myArticle->links() }}
                </div>

            </div>
        </div>
    </div>

   
@endsection
