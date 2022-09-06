@extends('components.base')

@section('title', 'Просмотр обьявления')

@section('content')

    <section class="container productCartContainer">

        <div id="product-big" class="mb-5">

            @include('components.productCartBig.productNameCart')

            <div id="productCart" class="productCart">

                <div class="productImg">
                    @if($ad->images && count($ad->images) >= 1)
                        <div id="carouselExampleIndicators" class="carousel slide productImgCarousel h-100"
                             data-bs-ride="true">
                            <div class="carousel-inner h-100">
                                <div class="productViewBig h-100">
                                    <div class="carousel-item active h-100">
                                        <img class="image modalWindow d-block w-100"
                                             src="{{ Storage::url($ad->images[0]->path) }}" alt="...">
                                    </div>

                                    @foreach($ad->images as $image)
                                        @if ($loop->first)
                                            @continue
                                        @endif
                                        <div class="carousel-item h-100">
                                            <img class="image modalWindow d-block w-100"
                                                 src="{{ Storage::url($image->path) }}" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="carousel-indicators productViewSmall">
                                @foreach($ad->images as $image)
                                    @if ($loop->first)
                                        <img src="{{ Storage::url($image->path) }}"
                                             data-bs-target="#carouselExampleIndicators"
                                             data-bs-slide-to="{{ $loop->index }}" class="active" aria-current="true"
                                             aria-label="Slide {{ $loop->iteration }}">
                                        @continue
                                    @endif
                                    <img src="{{ Storage::url($image->path) }}"
                                         data-bs-target="#carouselExampleIndicators"
                                         data-bs-slide-to="{{ $loop->index }}"
                                         aria-label="Slide {{ $loop->iteration }}">
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @else

                        <div class="productViewBig h-100">
                            <img class="h-100" src="{{ asset('images/150.png' )}}" alt="no-image">
                        </div>
                    @endif
                </div>
                <div class="productCartInfo">
                    @include('components.productCartBig.adContactCart')
                    @if (auth()->user())
                        @include('components.productCartBig.addToFavCart')
                        @include('components.productCartBig.productInfo')
                    @endif
                </div>

            </div>
        </div>

        <div class="description">
            <h2>Описание</h2>
            <p> {{ $ad['text'] }} </p>
        </div>
        <a href="{{ route('complainAd', $ad->id) }}" class="link-danger fs-4">Пожаловаться на это объявление</a>

    </section>

@endsection
