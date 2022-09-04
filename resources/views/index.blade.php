@extends('components.base')

@section('title',"Главная")

@section('content')

@include('components.hero')

{{-- Блок как это работает --}}
{{-- @include('components.headers.steps') --}}

{{-- Блок поиска --}}
<section id="main-search" class="container">
  @include('components.searchForm')
</section>

{{-- Последние 10 объявлений --}}
<section id="products-last" class="products-last container">
  <h3 class="products-last__title title">Последние 10 объявлений</h3>

  @include('components.productsLast')

</section>

@endsection
