@extends('components.base')

@section('title',"Приглянулись")

@section('content')

    <section class="container wish-list">

        @if(count($ads))

            <h2 class="wish-list__title">То что вы захотели получить или поменяться</h2>

            <div class="wish-list__list">
                @foreach($ads as $item)
                    @include('components.cardsTemplate.littelCardHorizontal')
                @endforeach
            </div>

        @else
            <div class="wish-list__empty">
                <h2 class="wish-list__title wish-list__title--empty">У вас нет приглянувшихся вещей? Давайте
                    опробуем поискать </h2>

                <a href="{{ route('searchPage') }}" class="wish-list__btn btn btn-blue">Перейти к объявлениям</a>
            </div>

        @endif

    </section>

@endsection
