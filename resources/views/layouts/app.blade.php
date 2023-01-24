<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} @yield('title') </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/q_and_a.css') }}" rel="stylesheet">

    @yield('style')

    <script src="https://kit.fontawesome.com/eea364082e.js" crossorigin="anonymous"></script>

    {{-- for mdbootstrap --}}
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet"/>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet"/>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #faca7b">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="{{ asset('/storage/images/resources/Logo_pet.png') }}" class="img-fluid" alt="logo" style="width:50px; height: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item me-2">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item me-2">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                            <li class="nav-item me-2">
                                <a class="nav-link" href="#">About Us</a>
                            </li>

                            <li class="nav-item me-2">
                                <a class="nav-link" href="#">FAQs</a>
                            </li>

                            <li class="nav-item me-2">
                                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                            </li>
                        @else
                            <li class="nav-item me-2">
                                <a class="nav-link fs-4" href="#"><i class="fa-solid fa-hand-holding-heart" data-mdb-toggle="tooltip" data-mdb-placement="bottom"
                                    title="Donation"></i></a>
                            </li>

                            <li class="nav-item me-2">
                                <a class="nav-link fs-4" href="/pet-news"><iconify-icon inline icon="material-symbols:newspaper" data-mdb-toggle="tooltip" data-mdb-placement="bottom"
                                    title="News"></iconify-icon></a>
                            </li>

                            <li class="nav-item me-2">
                                <a class="nav-link fs-4" href="#"><iconify-icon inline icon="mdi:typewriter" data-mdb-toggle="tooltip" data-mdb-placement="bottom"
                                    title="Post"></iconify-icon></a>
                            </li>

                            <li class="nav-item me-2">
                                <a class="nav-link fs-4" href="{{ route("questions.index")}}"><i class="fa-solid fa-pen-to-square" data-mdb-toggle="tooltip" data-mdb-placement="bottom"
                                    title="Q&A"></i></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fs-4" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa-regular fa-circle-user"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item fw-bold" href="{{ route('profile.show' , \Auth::user()->id) }}">{{ \Auth::user()->name }}</a>
                                    <a class="dropdown-item" href="#">About Us</a>
                                    <a class="dropdown-item" href="#">FAQs</a>
                                    <a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
<<<<<<< Updated upstream
            @yield('scripts')
=======
>>>>>>> Stashed changes
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
    @yield('script')
</body>
</html>
