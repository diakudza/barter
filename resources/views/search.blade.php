@extends('components.base')

@section('title', 'Поиск')

@section('content')

<!-- 
<div class="mt-5 mb-5">
</div> -->

<section class="container">
    @include('components.searchForm')
</section>


<section class="container search-result">
    @if (isset($searchResult))

    <h3 class="search-result__title title">Результаты поиска</h3>
    <div class="search-result__container">
        @foreach ($searchResult as $item)

        @include('components.littelCard')

        @endforeach
    </div>

    @endif
</section>
@endsection