@extends('components.base')

@section('title', 'Просмотеть мои объявления')

@section('content')

<<<<<<< HEAD
<div class="container">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Мои объявления</h1>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @forelse ($ads as $ad)

                @include('components.adCartLK')

                @empty
                <h3>Вы пока не разместили ни одного объявления</h3>
                @endforelse
=======
    <div class="container">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Мои объявления</h1>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row gap-5">
                    @forelse ($ads as $ad)
                        @include('components.adCartLK')
                    @empty
                        <h3>Вы пока не разместили ни одного объявления</h3>
                    @endforelse
                </div>
>>>>>>> 3a709e7217c975d7078f70d9f75c88dd3b4dfb41
            </div>
        </div>
    </div>
</div>

@endsection