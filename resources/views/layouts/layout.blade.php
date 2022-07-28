<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/product/product.css" rel="stylesheet">
</head>
<body>
<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2 d-none d-md-inline-block" href="/">Главная</a>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="py-2 d-none d-md-inline-block">Личный кабинет</a>
            @else
                <a href="{{ route('login') }}" class="py-2 d-none d-md-inline-block">Войти</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="py-2 d-none d-md-inline-block">Зарегистрироваться</a>
                @endif
            @endauth
        @endif
    </div>
</nav>
<div class="container">@yield('main_content')</div>
</body>
</html>
