<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow" />
    <meta name="google" content="notranslate" />
    <meta name="description" content="Не нужные товары найдут новых хозяев">
    <meta name="keywords" content="обмен, бартер" />

    @vite(['resources/css/style.scss'])

    <title> @yield('title')</title>
</head>

<body>
    <x-nav></x-nav>

    <main id="main" class="main">
        @yield('content')
    </main>

    <!-- @include('components.alert') -->

    <x-footer></x-footer>

    @vite(['resources/js/app.js'])
</body>

</html>