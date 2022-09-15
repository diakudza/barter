@extends('components.base')

@section('title',"Личный кабинет")

@section('content')
    <section class="container wish-list">

        @if(count($ads))

            <h2 class="wish-list__title">То что вы добавили в избранное</h2>

            <div class="wish-list__list">
                @foreach($ads as $item)
                    @include('components.cardsTemplate.littelCardHorizontal')
                @endforeach
            </div>

        @else
            <div class="wish-list__empty">
                <h2 class="wish-list__title wish-list__title--empty">Вам ни чего не понравилось. Давайте исправим?
                    😎 </h2>
                <a href="{{ route('searchPage') }}" class="wish-list__btn btn btn-blue">Перейти к объявлениям</a>
            </div>

        @endif

    </section>

@endsection
