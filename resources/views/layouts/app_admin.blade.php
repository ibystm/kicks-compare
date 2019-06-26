<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KICKS COMPARE</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito"
    rel="stylesheet"
    ype="text/css"
    >

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/vendor/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/flat-ui.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="admin-bg-paper">
        <div id="app">
        <nav class="navbar navbar-default navbar-lg navbar-expand-lg fixed-top" role="navigation">
            <a class="navbar-brand" href="{{ route('top') }}">
            for Administrator
            </a>
            <button
            type="button"
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navbar-collapse-01"
            ></button>
            <div
            class="collapse navbar-collapse"
            id="navbar-collapse-01"
            >
                <ul class="nav navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a
                        class="nav-link"
                        href="{{ route('admin.login') }}"
                        >
                            {{ __('Login') }}
                        </a>
                    </li>
                    <li class="dropdown">
                        <a
                        class="nav-link dropdown"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        v-pre
                        >
                        <span class="caret"></span>
                        </a>
                        <div
                        class="dropdown-menu dropdown-menu-right"
                        aria-labelledby="navbarDropdown"
                        >
                            <a
                            class="dropdown-item"
                            href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >
                                {{ __('Logout') }}
                            </a>
                            <form
                            id="logout-form"
                            action="{{ route('admin.logout') }}"
                            method="POST"
                            style="display: none;"
                            >
                            @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav><!-- /navbar -->
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
