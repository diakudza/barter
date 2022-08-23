@extends('components.base')

@section('title',"Главная")

@section('content')

@include('components.hero')

<section id="howitwork" class="container">

  <div class="mb-5">
    <p>
      Вы можете разместить объявление с вашей ненужной вещью и кто-то обязательно ее найдет и откликнется.
      Или вы можете воспользоваться поиском и попробовать предложить кому-то обмен вашей вещи на найденную в
      поиске.
      После предложения обмена, хозяин вещи может выбрать способ доставки или личной встречи дял обмена.
    </p>
  </div>

</section>

<!-- Блок поиска -->
<section id="main-search" class="container">

  @include('components.searchForm')

</section>

<!-- Последние 10 объявлений -->
<section id="products-last" class="products-last container">
  <h3 class="products-last__title title">Последние 10 обьявлений</h3>

  @include('components.products-last')

</section>

@endsection