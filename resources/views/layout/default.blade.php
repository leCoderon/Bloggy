<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="./defaultAssets/assets/favicon.ico" />
    {{-- Font Awesome icons (free version) --}}
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    {{-- Google fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    {{-- bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    {{-- Core theme CSS (includes Bootstrap) --}}
    <link href="../defaultAssets/css/styles.css" rel="stylesheet" />
    {{-- Customized css --}}
    <link rel="stylesheet" href="../style.css">

    {{-- SweetAlert for Toast Notifications --}}
    <link rel="stylesheet" href="../sweetalert.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    {{-- Navigation --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky top" id="navbar_top">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ route('homepage') }}">Bloggy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0 d-flex align-items-center">
                    {{-- <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.html">Home</a></li>
                    --}}


                    @auth
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="{{ route('articles.index') }}">Articles</a></li>
                        <li class="nav-item">
                            {{-- Example single danger button --}}
                            <div class="btn-group ">
                                <button type="button" class="btn text-white dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">

                                    <img src="{{ Auth::user()->avatar ? asset('../storage/avatars/' . Auth::user()->avatar) : '../default-avatar.png' }}"
                                        alt="" id="avatar_menu"></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item text-dark fs-6" href="#">Connecté en tant que</a></li>
                                    <li><a class="dropdown-item text-black fw-bold"
                                            href="#">{{ Auth::user()->email }}</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-grid"></i>
                                            Tableau de bord</a></li>
                                    <li><a class="dropdown-item" href="{{ route('profil') }}"><i
                                                class="bi bi-person-circle"></i>
                                            Mon profil</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"><i
                                                class="bi bi-box-arrow-right"></i> Se déconnecter</a></li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('login') }}">Se
                                connecter</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 btn btn-secondary"
                                href="{{ route('register') }}">Créer
                                un compte </a></li>

                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    {{-- Content goes here --}}
    @yield('content')

    {{-- Footer --}}
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Bloggy 2023 <br> Designed by
                        Ismael Camara #LeCoderon</div>
                </div>
            </div>
        </div>
    </footer>




    {{--  SWEET ALERT  --}}
    {{-- FORMS FIELDS ERRORS --}}
    @error('name')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'error',
                title: "{{ $message }}",
            })
        </script>
    @enderror

    {{-- SUCCESS REQUEST --}}
    @if (session()->has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'success',
                title: "{{ session()->get('success') }}",
            })
        </script>
    @endif

    {{-- ERRORS REQUEST --}}
    @if (session()->has('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'error',
                title: "{{ session()->get('error') }}",
            })
        </script>
    @endif



    {{-- Bootstrap core JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Core theme JS --}}
    <script src="../defaultAssets/js/scripts.js"></script>

    {{-- Sticky navbar --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    document.getElementById('navbar_top').classList.add('fixed-top');
                    // add padding top to show content behind navbar
                    navbar_height = document.querySelector('.navbar').offsetHeight;
                    document.body.style.paddingTop = navbar_height + 'px';
                } else {
                    document.getElementById('navbar_top').classList.remove('fixed-top');
                    // remove padding top from body
                    document.body.style.paddingTop = '0';
                }
            });
        });
    </script>

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Script AJAX avec jQuery pour les likes sans rechargement de la page
        $(document).ready(function() {
            $('#like-form').submit(function(event) {
                event.preventDefault();
                var articleId = $(this).data('article-id');

                $.ajax({
                    type: 'POST',
                    url: '/article/' + articleId + '/like',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(data) {
                        // Mettre à jour le nombre de likes sur la page
                        $('#likes-count').text(data.likes + ' Likes');

                        // Mettre à jour le texte du bouton avec des icônes Bootstrap
                        var likeButton = $('#like-form button');
                        if (data.success) {
                            likeButton.html(data.likes > 0 ?
                                '<i class="bi bi-hand-thumbs-down"></i>' :
                                '<i class="bi bi-hand-thumbs-up"></i>');
                        }

                    }
                });
            });
        });
    </script>

</html>
