@extends('components.base')

@section('title',"Главная")

@section('content')

@include('components.header')

<div class="container">

  <div id="howitwork" class="mb-5">
    <p>
      Вы можете разместить обьявление с вашей ненужной вещью и кто-то обязательно ее найдет и откликнится.
      Или вы можете воспользоваться поиском и попробовать предложить кому-то обмен вашей вещи на найденную в
      поиске.
      После предложения обмена, хозяин вещи может выбрать способ доставки или личной встречи дял обмена.
    </p>
  </div>

  <!-- Блок поиска -->
  <div class="d-flex flex-row justify-content-sm-evenly">

    @include('components.searchForm')

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
