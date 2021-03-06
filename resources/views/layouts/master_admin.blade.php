<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>KICKS COMPARE</title>
        <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
        >

        <link
        href="{{ asset('dist/css/vendor/bootstrap.min.css') }}"
        rel="stylesheet"
        >
        <link
        href="{{ asset('dist/css/flat-ui.min.css') }}"
        rel="stylesheet"
        >
        <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
        crossorigin="anonymous"
        >
        <link
        href="https://fonts.googleapis.com/css?family=Oswald&display=swap"
        rel="stylesheet"
        >
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script> -->
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link rel="shortcut icon" href="img/favicon.ico">
    </head>
    <body>
        <nav
        class="navbar navbar-default navbar-fixed-top navbar-lg navbar-expand-lg fixed-top"
        role="navigation"
        >
            <a class="navbar-brand" href="{{ route('admin.top') }}">
            for Administrator
            </a>
            <button type="button"
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navbar-collapse-01"
            ></button>
            <div
            class="collapse navbar-collapse"
            id="navbar-collapse-01"
            >
                <ul class="nav navbar-nav ml-auto">
                    <li>
                    <a href="{{ route('admin.create') }}">
                        CREATE
                    </a>
                    </li>
                    @auth
                        <li>
                            <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >
                                LOGOUT
                            </a>
                            <form
                            id="logout-form"
                            action="{{ route('logout') }}"
                            method="POST"
                            style="display: none;"
                            >
                                {{ csrf_field() }}
                            </form>
                        </li>
                @endauth
                @guest
                    <li>
                        <a
                        href="{{ route('login') }}"
                        >
                        LOGIN
                        </a>
                    </li>
                @endguest
                </ul>
                <form
                class="navbar-form form-inline my-2 my-lg-0"
                action="{{ route('top') }}"
                method="get"
                role="search"
                >
                    <div class="form-group">
                        <div class="input-group">
                            <input
                            class="form-control"
                            id="navbarInput-01"
                            name="search"
                            type="text"
                            placeholder="Search"
                            value="{{ empty($inputs)? null : $inputs }}"
                            >
                            <span class="input-group-btn">
                                <button type="submit" class="btn">
                                <span class="fui-search"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </nav>

        @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <span class="logo">KICKS COMPARE</span>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="menu">
                        <span>Menu</span>
                        <li>
                            <a href="{{ route('top') }}">PUBLIC PAGE</a>
                        </li>
                        <li>
                            <a href="#">ABOUT US</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="address">
                        <span>Contact</span>
                        <li>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <a href="#">Phone</a>
                        </li>
                        <li>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <a href="#">Adress</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <a href="#">Email</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
        <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"
        ></script>
        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"
        ></script>
        <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"
        ></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>