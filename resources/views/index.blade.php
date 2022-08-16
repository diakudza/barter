@extends('components.base')

@section('title',"Главная")

@section('content')


@include('components.header')

<div id="howitwork" class="mb-5 container">
  <p>
    Вы можете разместить обьявление с вашей ненужной вещью и кто-то обязательно ее найдет и откликнится.
    Или вы можете воспользоваться поиском и попробовать предложить кому-то обмен вашей вещи на найденную в
    поиске.
    После предложения обмена, хозяин вещи может выбрать способ доставки или личной встречи дял обмена.
  </p>
</div>

<!-- Блок поиска -->
<section id="main-search" class="container d-flex flex-row justify-content-sm-evenly">

  @include('components.searchForm')

</section>

<!-- Последние 10 объявлений -->
<section id="products-last" class="products-last container">
  <h3 class="products-last__title title">Последние 10 обьявлений</h3>

  @include('components.products-last')

</section>

@endsection