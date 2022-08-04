<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow" />
    <meta name="google" content="notranslate" />
    <meta name="description" content="Не нужные товары найдут новых хозяев">
    <meta name="keywords" content="обмен, бартер" />
    <!-- <link href=" {{ asset('css/styles.css') }}" rel="stylesheet"> -->
    @vite(['resources/css/style.scss'])


    <title> @yield('title')</title>
</head>

<body>

    @include('component.navigation')

    @yield('content')

    <x-footer></x-footer>

    <!-- <script src="{{ asset('js/app1.js') }}"></script> -->
    @vite(['resources/js/app.js'])
</body>

</html>