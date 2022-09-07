@extends('components.base')

@section('title',"Личный кабинет")

@section('content')
    <section class="container wish-list">

        @if(count($ads))

            <h2 class="wish-list__title">То что вам приглянулось</h2>

           @foreach($ads as $item)
                <div class="wish-list__list">
                    @include('components.cardsTemplate.littelCard')
                    {{-- @include('components.cardsTemplate.adCartLKHorizont')--}}
                </div>

            @endforeach

        @else
            <div class="wish-list__empty">
                <h2 class="wish-list__title wish-list__title--empty">Вам ни чего не понравилось. Давайте исправим? 😎 </h2>
                <a href="{{ route('searchPage') }}" class="wish-list__btn btn btn-blue">Перейти к объявлениям</a>
            </div>

        @endif

    </section>

@endsection
