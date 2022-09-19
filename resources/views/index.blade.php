@extends('components.base')

@section('title',"Главная")

@section('content')

@include('components.headers.hero')

{{-- Блок как это работает --}}
{{-- @include('components.headers.steps') --}}

{{-- Блок поиска --}}
<section id="main-search" class="container">
  @include('components.searchForm')
</section>

{{-- Последние 10 объявлений --}}
<section id="products-last" class="products-last container">
  <h3 class="products-last__title title">Последние объявления</h3>

  <div class="products-last__list">

    @foreach($lastTenAds as $item)
      @include('components.cardsTemplate.littelCard')
    @endforeach()

  </div>

</section>

@endsection