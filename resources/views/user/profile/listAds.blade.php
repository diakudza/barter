@extends('components.base')

@section('title', 'Просмотеть мои объявления')

@section('content')

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
                </div>
            </div>
        </div>
    </div>

@endsection
