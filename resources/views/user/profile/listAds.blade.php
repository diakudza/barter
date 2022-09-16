@extends('components.base')

@section('title', 'Мои объявления')

@section('content')

    <section class="container">

        @if(count($ads))

            <h2 class="wish-list__title">Мои объявления</h2>

            <div class="wish-list__list">
                @foreach($ads as $item)
                    @include('components.cardsTemplate.littelCardHorizontal')
                @endforeach
            </div>

        @else
            <div class="wish-list__empty">
                <h2 class="wish-list__title wish-list__title--empty">У вас пока нет объявлений!</h2>
                <a href="{{route('user.profile.createAd')}}" class="wish-list__btn btn btn-blue">Выставить
                    объявление</a>
            </div>

        @endif

    </section>

@endsection
