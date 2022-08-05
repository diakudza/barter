@extends('component.base')

@section('title',"Динамическое название")

@section('content')

@include('component.header')

<div class="container">

  <div id="howitwork" class="mb-5">
    <p>
      Я тут что-нибудь сделаю
    </p>
  </div>

  <!-- Блок поиска -->
  <div class="d-flex flex-row justify-content-sm-evenly">

    @include('component.searchForm')

  </div>

  <!-- Последние 10 объявлений -->
  <div class="d-flex flex-column w-50">
    <h3>Последние 10 обьявлений</h3>

    <div class="products-last__list">
      @foreach($lastTenAds as $ad)
      <div class="product-last__item">
        <a href="{{ route('ad.show', $ad['id']) }}">
          <h4 class="product__title">{{ $ad['title'] }}</h4>
        </a>
      </div>
      @endforeach()
    </div>
  </div>
</div>

@endsection
