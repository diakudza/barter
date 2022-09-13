@extends('components.base')

@section('title', 'Поиск')

@section('content')

<section class="container">
    @include('components.searchForm')
</section>

<section class="container search-result">

    @if(isset($searchResult))
    <h3 class="search-result__title title">Результаты поиска</h3>

    <div class="search-result__container">

        @foreach ($searchResult as $item)
        @include('components.cardsTemplate.littelCard')
        @endforeach

    </div>

    @elseif($adsByUserCity)

    <div class="search-result__city">
        <h3 class="search-result__title title">Возможно вас заинтересуют объявления в Вашем городе</h3>

        <div class="search-result__container">
            @foreach ($adsByUserCity as $item)
            @include('components.cardsTemplate.littelCard')
            @endforeach
        </div>
    </div>
    @else
    <h3 class="search-result__title title">Давайте что-нибудь поищем!</h3>
    @endif

</section>
@endsection