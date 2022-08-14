@extends('components.base')

@section('title',"Главная")

@section('content')

    @include('components.header')

    <div class="container ">

        <div id="howitwork" class="mb-5">
            <p>
                Вы можете разместить обьявление с вашей ненужной вещью и кто-то обязательно ее найдет и откликнится.
                Или вы можете воспользоваться поиском и попробовать предложить кому-то обмен вашей вещи на найденную в
                поиске.
                После предложения обмена, хозяин вещи может выбрать способ доставки или личной встречи дял обмена.
            </p>
        </div>


        <!-- Блок поиска -->
        <div id="search" class="d-flex flex-column align-items-center ">
            <h3>Искать без регистрации!</h3>
            @include('components.searchForm')
        </div>

        <!-- Последние 10 объявлений -->
        <div class="d-flex flex-column mt-5 ">
            <h3>Последние 10 обьявлений</h3>
            <div class="products-last__list d-flex flex-row flex-wrap gap-2">
                @foreach($lastTenAds as $item)
                    @include('components.adCart')
                @endforeach()
            </div>
        </div>

    </div>

@endsection
