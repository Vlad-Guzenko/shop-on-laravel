<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("{{asset('images/main2.jpg')}}");
                -moz-background-size: 100% 100%;
                background-size: 100% 100%;
                color: chocolate;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: chocolate;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            a {
                padding: 5px;
                margin-right: 40px;
                border:  1px solid darkorange;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @if(Auth::user()->isDisabled())
                        <strong><a href="{{ url('/') }}" style="color:blueviolet; text-decoration: none">Главная</a></strong>
                        @elseif(Auth::user()->isUser())
                        <strong><a href="{{ url('/user/index') }}" style="color:blueviolet; text-decoration: none">Кабинет</a></strong>
                        <strong><a href="{{ url('/') }}" style="color:blueviolet; text-decoration: none">Главная</a></strong>
                        @elseif(Auth::user()->isVisitor())
                        <strong><a href="{{ url('/u') }}" style="color:blueviolet; text-decoration: none">Главная</a></strong>
                        @elseif(Auth::user()->isAdministrator())
                        <strong><a href="{{ url('/admin/index') }}" style="color:blueviolet; text-decoration: none">Панель Администратора</a></strong>
                        <strong><a href="{{ url('/') }}" style="color:blueviolet; text-decoration: none">Главная</a></strong>
                        @endif

                        <strong>
                            <a class="dropdown-item" href="{{ route('logout') }}" style="color:blueviolet; text-decoration: none"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Выйти</a>
                        </strong>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" style="color:blueviolet; text-decoration: none">Войти</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color:blueviolet; text-decoration: none">Регистрация</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel!!!
                </div>

                @php
                $p = \App\SBlog\Core\BlogApp::get_instance()->getProperty('admin_email');
                //dd($p);
                @endphp

                {{-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> --}}
            </div>
        </div>
    </body>
</html>
