{{--Пока оставим так картинку--}}
{{-- @if($ad->images && count($ad->images) >= 1)--}}
<img class="product-card__img" src="{{ Storage::url($ad->images[0]->path) }}" alt="$ad->title">


<div class="slider locations__slider">
    <div class="swiper locations__slider-container">
        <div class="swiper-wrapper locations__slider-wrapper">
            <div class="slider__slide swiper-slide slide locations__slide">
                <a data-fancybox="gallery-locations" href="@images/location/big/loc1.jpg" data-caption="локация 1">
                    <div class="slide__content">
                        <img loading="lazy" class="slide__img" src="@images/location/loc1.jpg" alt="локация 1" />
                        <h3 class="slide__title">Название локации 1</h3>
                    </div>
                </a>
            </div>

            <div class="slider__slide swiper-slide slide locations__slide">
                <a data-fancybox="gallery-locations" href="@images/location/big/loc2.jpg" data-caption="локация 2">
                    <div class="slide__content">
                        <img loading="lazy" class="slide__img" src="@images/location/loc2.jpg" alt="локация 2" />
                        <h3 class="slide__title">Название локации 2</h3>
                    </div>
                </a>
            </div>

            <div class="slider__slide swiper-slide slide locations__slide">
                <a data-fancybox="gallery-locations" href="@images/location/big/loc3.jpg" data-caption="локация 3">
                    <div class="slide__content">
                        <img loading="lazy" class="slide__img" src="@images/location/loc3.jpg" alt="локация 3" />
                        <h3 class="slide__title">Название локации 3</h3>
                    </div>
                </a>
            </div>

            <div class="slider__slide swiper-slide slide locations__slide">
                <a data-fancybox="gallery-locations" href="@images/location/big/loc1.jpg" data-caption="локация 4">
                    <div class="slide__content">
                        <img loading="lazy" class="slide__img" src="@images/location/loc1.jpg" alt="локация 4" />
                        <h3 class="slide__title">Название локации 4</h3>
                    </div>
                </a>
            </div>

            <div class="slider__slide swiper-slide slide locations__slide">
                <a data-fancybox="gallery-locations" href="@images/location/big/loc2.jpg" data-caption="локация 5">
                    <div class="slide__content">
                        <img loading="lazy" class="slide__img" src="@images/location/loc2.jpg" alt="локация 5" />
                        <h3 class="slide__title">Название локации 5</h3>
                    </div>
                </a>
            </div>

            <div class="slider__slide swiper-slide slide locations__slide">
                <a data-fancybox="gallery-locations" href="@images/location/big/loc3.jpg" data-caption="локация 6">
                    <div class="slide__content">
                        <img loading="lazy" class="slide__img" src="@images/location/loc3.jpg" alt="локация 6" />
                        <h3 class="slide__title">Название локации 6</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <button class="slider-button slider-button-prev locations__btn-prev">
        <svg class="slider-button__icon" viewBox="0 0 24 45" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use xlink:href="#slider-arrow"></use>
        </svg>
    </button>

    <button class="slider-button slider-button-next locations__btn-next">
        <svg class="slider-button__icon" viewBox="0 0 24 45" fill="none" xmlns="http://www.w3.org/2000/svg">
            <use xlink:href="#slider-arrow"></use>
        </svg>
    </button>
</div>

<button class="locations__btn btn" data-fancybox="modals" data-src="#modal-locations"><span>выбрать локацию</span></button>


{{--        <div class="productImg">--}}
{{--            @if($ad->images && count($ad->images) >= 1)--}}
{{--                <div id="carouselExampleIndicators" class="carousel slide productImgCarousel h-100"--}}
{{--                     data-bs-ride="true">--}}
{{--                    <div class="carousel-inner">--}}
{{--                        <div class="productViewBig ">--}}
{{--                            <div class="carousel-item active ">--}}
{{--                                <img class="image modalWindow " src="{{ Storage::url--}}
{{--                                            ($ad->images[0]->path) }}" alt="...">--}}
{{--                            </div>--}}

{{--                            @foreach($ad->images as $image)--}}
{{--                                @if ($loop->first)--}}
{{--                                    @continue--}}
{{--                                @endif--}}
{{--                                <div class="carousel-item h-100">--}}
{{--                                    <img class="image modalWindow d-block w-100"--}}
{{--                                         src="{{ Storage::url($image->path) }}" alt="...">--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div id="productCart" class="productCart">--}}

{{--                    <div class="productImg">--}}
{{--                        @if($ad->images && count($ad->images) >= 1)--}}
{{--                            --}}
{{--                            <div id="carouselExampleIndicators" class="carousel slide productImgCarousel h-100"--}}
{{--                                 data-bs-ride="true">--}}
{{--                                --}}
{{--                                <div class="carousel-inner h-100">--}}
{{--                                    <div class="productViewBig h-100">--}}
{{--                                        <div class="carousel-item active h-100">--}}
{{--                                            <img class="image modalWindow d-block w-100"--}}
{{--                                                 src="{{ Storage::url($ad->images[0]->path) }}" alt="...">--}}
{{--                                        </div>--}}

{{--                                        @foreach($ad->images as $image)--}}
{{--                                            @if ($loop->first)--}}
{{--                                                @continue--}}
{{--                                            @endif--}}
{{--                                            <div class="carousel-item h-100">--}}
{{--                                                <img class="image modalWindow d-block w-100"--}}
{{--                                                     src="{{ Storage::url($image->path) }}" alt="...">--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="carousel-indicators productViewSmall">--}}
{{--                                    @foreach($ad->images as $image)--}}
{{--                                        @if ($loop->first)--}}
{{--                                            <img src="{{ Storage::url($image->path) }}"--}}
{{--                                                 data-bs-target="#carouselExampleIndicators"--}}
{{--                                                 data-bs-slide-to="{{ $loop->index }}" class="active"--}}
{{--                                                 aria-current="true"--}}
{{--                                                 aria-label="Slide {{ $loop->iteration }}">--}}
{{--                                            @continue--}}
{{--                                        @endif--}}
{{--                                        <img src="{{ Storage::url($image->path) }}"--}}
{{--                                             data-bs-target="#carouselExampleIndicators"--}}
{{--                                             data-bs-slide-to="{{ $loop->index }}"--}}
{{--                                             aria-label="Slide {{ $loop->iteration }}">--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}

{{--                                <button class="carousel-control-prev" type="button"--}}
{{--                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">--}}
{{--                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                                    <span class="visually-hidden">Previous</span>--}}
{{--                                </button>--}}

{{--                                <button class="carousel-control-next" type="button"--}}
{{--                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">--}}
{{--                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                                    <span class="visually-hidden">Next</span>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        @else--}}

{{--                            <div class="productViewBig h-100">--}}
{{--                                <img class="h-100" src="{{ asset('images/150.png' )}}" alt="no-image">--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            @endif--}}
{{--        </div>--}}