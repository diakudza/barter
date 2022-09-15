@extends('components.base')

@section('title', 'Просмотр объявления')

@section('content')

    <section class="container product-card">

        <h2 class="product-card__title">{{ Str::limit($ad->title, 65) }}</h2>

        <div class="product-card__container">

            <div class="product-card__wrapper">
                <div class="product-card__photo-content photo-content">
                    @include('components.productCartBig.productCardPhoto')
                </div>

                <div class="product-card__description description-block">
                    <h3 class="description-block__title">Описание</h3>

                    <p class="description-block__text">{{ $ad['text'] }}</p>
                </div>
            </div>

            <div class="product-card__info info-blocks">
                @include('components.productCartBig.productCardInfo')
            </div>

        </div>

    </section>

@endsection
