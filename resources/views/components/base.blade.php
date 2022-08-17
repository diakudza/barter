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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- пока верну, а то бутстраповскме элементы для разработки не работают -->
    <title> @yield('title')</title>
</head>

<body>
    <x-nav></x-nav>

    <main id="main" class="main">
        @yield('content')
    </main>

    @include('components.alert')

    <x-footer></x-footer>

    <!-- <script src="{{ asset('js/app1.js') }}"></script> -->

    @vite(['resources/js/app.js'])
</body>

</html>