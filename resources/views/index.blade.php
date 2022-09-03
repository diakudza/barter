@extends('components.base')

@section('title',"Главная")

@section('content')

@include('components.hero')

<section id="howitworks" class="container how-it-work">

  <h2 class="how-it-work__title title">Как это работает</h2>

  <div class="how-it-work__list">
    <div class="how-it-work__item">
      <h3 class="how-it-work__subtitle"></h3>
      <div class="how-it-work__img">
        <img src="" alt="test1">
      </div>
    </div>
    <div class="how-it-work__item">
      <h3 class="how-it-work__subtitle"></h3>
      <div class="how-it-work__img">
        <img src="" alt="test1">
      </div>
    </div>
    <div class="how-it-work__item">
      <h3 class="how-it-work__subtitle"></h3>
      <div class="how-it-work__img">
        <img src="" alt="test1">
      </div>
    </div>
  </div>

  <p class="how-it-work__text">
    Вы можете разместить объявление с вашей ненужной вещью и кто-то обязательно ее найдет и откликнется.
    Или вы можете воспользоваться поиском и попробовать предложить кому-то обмен вашей вещи на найденную в
    поиске.
    После предложения обмена, хозяин вещи может выбрать способ доставки или личной встречи для обмена.
  </p>

</section>

<!-- Блок поиска -->
<section id="main-search" class="container">
  @include('components.searchForm')
</section>

<!-- Последние 10 объявлений -->
<section id="products-last" class="products-last container">
  <h3 class="products-last__title title">Последние 10 объявлений</h3>

  @include('components.productsLast')

</section>

@endsection