<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="navbar-header" id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="navbar-top">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-brand " id="logo" href="{{ url('/') }}">
                    S P
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <li class="nav-item">
                                <a class="nav-link" id="nav-link regandlog"
                                   href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" id="nav-link regandlog"
                                   href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                    <!-- Search form -->
                        <form class="text-center" action="{{route('find')}}" method="GET">

                            <input type="search" id="search" name="search" class="position-absolute-parent"
                                   placeholder="search product" autocomplete="off">
                            <button type="submit" class="btn btn-primary col-2 float-right search-btn">Search</button>
                            @if(session()->has('error'))
                                <div class="alert alert-danger" id="input-alert">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                        </form>
                        <!-- Search autocomplite result -->
                        <div id="result" class="position-absolute-child" style="display:none">
                            <ul class="position-relative" id="productList"></ul>
                        </div>
                        <!-- location dropdown -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Locations
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('prod-location.list') }}">
                                    Locations list
                                </a>
                                <a class="dropdown-item" href="{{ route('prod-location.create') }}">
                                    Create new location
                                </a>
                            </div>
                            <!--flavors dropdown -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Flavors
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('flavors.list') }}">
                                    Flavors list
                                </a>
                                <a class="dropdown-item" href="{{ route('flavor.create') }}">
                                    Create new flavor
                                </a>
                            </div>
                            <!-- manufacturer dropdown -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Manufacturers
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('manufacturer.list') }}">
                                    Manufacturers list
                                </a>
                                <a class="dropdown-item" href="{{ route('manufacturer.create') }}">
                                    Create manufacturer
                                </a>
                            </div>
                            <!--category dropdownd -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Categories
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('categories.list') }}">
                                    Categories
                                </a>
                                <a class="dropdown-item" href="{{ route('category.create') }}">
                                    Create category
                                </a>
                            </div>
                            <!-- admin dropdown-->
                        <li class="nav-item dropdown ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role_id == 1)
                                    <a class="dropdown-item" href="{{ route('users.list') }}">
                                        All users
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
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

    <body>
    <main class="py-4 content">
        @yield('content')


    </main>
    </body>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#search').keyup(function () {
            var search = $('#search').val();
            if (search == "") {
                $("#productList").html("");
                $('#result').hide();
            } else {
                $.get("{{ URL::to('search') }}", {search: search}, function (data) {
                    $('#productList').empty().html(data);
                    $('#result').show();
                })
            }
        });
    });
</script>
</body>
</html>
