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
    <div class="page">
        @include('components.header')

        <main id="main" class="main">
            @yield('content')
        </main>

        @include('components.footer')
        @include('components.alert')

        @include('components.modalsWindow')
    </div>

    <div class="btn-top">
        <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_1954_24248)">
                <rect width="54" height="54" rx="27" />

                <path d="M27.707 18.9349C27.316 18.5439 26.684 18.5439 26.293 18.9349L15.793 29.4349C15.402 29.8259 15.402 30.4579 15.793 30.8489C16.184 31.2399 16.816 31.2399 17.207 30.8489L27 21.0559L36.793 30.8489C36.988 31.0439 37.244 31.1419 37.5 31.1419C37.756 31.1419 38.012 31.0439 38.207 30.8489C38.598 30.4579 38.598 29.8259 38.207 29.4349L27.707 18.9349Z" />
            </g>
        </svg>

    </div>


    @vite(['resources/js/app.js'])
</body>

</html>


