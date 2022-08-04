<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Bootstrap core CSS -->
    <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">
    <link href=" {{ asset('css/my.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- {{-- <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />--}}
    {{-- <script src="{{ asset("js/bootstrap.bundle.min.js") }}" crossorigin="anonymous"></script>--}}
    {{-- <script src="{{ asset("js/feather.min.js") }}" crossorigin="anonymous"></script>--}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>--}} -->

    <title> @yield('title')</title>
</head>

<body>
    @include('component.navigation')

    @yield('content')

    @include('component.footer')

</body>

</html>