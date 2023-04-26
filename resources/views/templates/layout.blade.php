<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Blog</title>
</head>
<body>
<div class='navbar navbar-expand-lg navbar-dark bg-dark px-5'>
    <a class='navbar-brand me-5' href={{ route('main') }}>BLOG</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class='collapse navbar-collapse' id="navbarSupportedContent">
        <ul class='navbar-nav'>
            <li class='nav-item'>
                <a class='nav-link' href={{ route('main') }}>Main</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href={{ route('about') }}>About</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href={{ route('post.index') }}>Posts</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href={{ route('contacts') }}>Contacts</a>
            </li>
            @can('view', auth()->user())
                <li class='nav-item'>
                    <a class='nav-link' href={{ route('admin.post.index') }}>Admin</a>
                </li>
            @endcan
        </ul>
        <ul class="navbar-nav ms-auto">
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
<div class='container-fluid p-5'>
    @yield('content')
</div>
</body>
</html>
