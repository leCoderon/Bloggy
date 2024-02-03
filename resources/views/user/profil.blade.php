@extends('./layout/default')
@section('title')
    Bloggy | Profile
@endsection

@section('content')
    {{-- Main Content--}}
    <br>
    <br>
    <br>
    <div class="container p-5 my-5">
        <div class="row">
            <div class="col-12">
                <h1>Profile Public</h1>
                {{-- Divider--}}
                <hr class="my-4" />
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-12 col-md-4">
                <h5>Votre Nom d'utilisateur</h5>
                <br>
                <div>
                    <form action="{{ route('update-name') }}" method="POST">
                        @csrf
                        @method('put')
                        

                    

                        <div class="mb-3"><input type="text" name="name" value="{{ Auth::user()->name }}">
                        </div>
                        <button class="btn btn-success" type="submit">Mettre à jour</button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <h5>Photo de Profile</h5>
                <br>
                <div class="mt-2"><img src="{{Auth::user()->avatar ? asset('storage/avatars/'. Auth::user()->avatar ) : 'default-avatar.png'}}" alt="" id="profil_avatar"></div>
                <div class="dropdown">  
                    <p class="dropdown-toggle p-0 mt-1 m-0  text-center w-50" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-pen"></i> Edit
                    </p>
                    <ul class="dropdown-menu">
                        <li>{{-- Button trigger modal --}}<a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Upload a photo..
                            </a></li>
                        <li>{{-- Button trigger modal --}}<a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#delete ">
                                Remove photo
                            </a></li>
                    </ul>
                </div>


                {{-- display resukts --}}
                @error('avatar')
                <div class="alert alert-danger d-flex justify-content-between">{{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
                @enderror
                {{-- @if (session()->has('successPhoto'))
                            <div class="alert alert-success d-flex justify-content-between">{{ session()->get('successPhoto') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif --}}
                {{-- @if (session()->has('fail'))
                            <div class="alert alert-success d-flex justify-content-between">{{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif --}}
            </div>
        </div>

    </div>
    </div>
@endsection



{{-- Modal to add photo--}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter une nouvelle photo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('avatar-update') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('put')
                    <input type="file" name="avatar">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Mettre à jour</button>

                </div>
            </form>

        </div>
    </div>
</div>

{{-- Modal to remove photo--}}
<div class="modal fade" id="delete"  data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Supprimer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <a href="{{route('avatar-delete')}}" class="btn btn-danger">Etes vous sûr de vouloir supprimer</a>

        </div>
    </div>
</div>
