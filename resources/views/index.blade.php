@extends('component.base')

@section('title',"Главная")

@section('content')

@include('component.header')

<div class="container">

  <div id="howitwork" class="mb-5">
    <p>
      Вы можете разместить обьявление с вашей ненужной вещью и кто-то обязательно ее найдет и откликнится.
      Или вы можете воспользоваться поиском и попробовать предложить кому-то обмен вашей вещи на найденную в
      поиске.
      После предложения обмена, хозяин вещи может выбрать способ доставки или личной встречи дял обмена.
    </p>
  </div>

  <div class="d-flex flex-row justify-content-sm-evenly">
    <div id="search" class="d-flex flex-column w-50">
      @include('component.searchForm')
    </div>
    <div class="d-flex flex-column w-50">
      <p>Последние 10 обьявлений</p>
      <table>
        @foreach($lastTenAds as $ad)
        <tr>
          <td>
            <a href="{{ route('ad.show', $ad['id']) }}">{{ $ad['title'] }}</a>
          </td>
        </tr>
        @endforeach()
      </table>
    </div>
  </div>

</div>

@endsection