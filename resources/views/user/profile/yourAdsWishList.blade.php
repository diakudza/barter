@extends('components.base')

@section('title',"Личный кабинет")

@section('content')

    <div class="container">
        <h3>Вы пожелали эти вещи:</h3>

        <div>
            @forelse($ads as $ad)
                @include('components.adCartLKHorizont')
            @empty
                Вы пока ничего не добавили
            @endforelse
        </div>
    </div>

    </div>

@endsection
