@extends('components.base')

@section('title', 'Просмотр объявления')

@section('content')

<section class="container productCartContainer">

    <div id="product-big" class="mb-5">

    <h2 class="productName">{{ Str::limit($ad->title, 65) }}</h2>

    <div class="productHeader">

        <div class="location">

            <p class="productLocation">
                <svg style="margin-right: 12.5px" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z"
                        stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z"
                        stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Категория: {{ $ad->category->title }}
            </p>

            <p class="productLocation">
                <svg style="margin-right: 12.5px" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z"
                        stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z"
                        stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Город: {{ $ad->city->name }}
            </p>

            <p class="productLocation">
                <svg style="margin-right: 12.5px" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z"
                        stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z"
                        stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Дата создания: {{ $ad->getCreatedDate() }}
            </p>
        </div>

{{--        <div class="add">--}}
{{--            @if (auth()->user())--}}
{{--                @if (!$userFavorite)--}}
{{--                    <form action="{{ route('favorite.store', ['ad_id' => $ad['id']]) }}" method="post">--}}
{{--                        @method('POST')--}}
{{--                        @csrf--}}
{{--                        <button class="addToFav btn btn-success">--}}
{{--                            <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14"--}}
{{--                                fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                    d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z"--}}
{{--                                    stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round"--}}
{{--                                    stroke-linejoin="round" />--}}
{{--                            </svg>--}}
{{--                            <p>Добавить в избранное</p>--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                @else--}}
{{--                    <form action="{{ route('favorite.destroy', $ad->id) }}" method="post">--}}
{{--                        @method('DELETE')--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" name="ad_id" value="{{ $ad->id }}" />--}}

{{--                        <button class="addToFav btn btn-danger">--}}
{{--                            <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14"--}}
{{--                                fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                    d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z"--}}
{{--                                    stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round"--}}
{{--                                    stroke-linejoin="round" />--}}
{{--                            </svg>--}}
{{--                            <p>Убрать из избранного</p>--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                @endif--}}

{{--                @if (!$userWishes)--}}
{{--                    <form action="{{ route('wishlist.store', ['ad_id' => $ad['id']]) }}" method="post">--}}
{{--                        @method('POST')--}}
{{--                        @csrf--}}
{{--                        <button class="addToFav btn btn-danger">--}}
{{--                            <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14"--}}
{{--                                fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                    d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z"--}}
{{--                                    stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round"--}}
{{--                                    stroke-linejoin="round" />--}}
{{--                            </svg>--}}
{{--                            <p>Бартер</p>--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                @else--}}
{{--                    <form action="{{ route('wishlist.destroy', $ad['id']) }}" method="post">--}}
{{--                        @method('DELETE')--}}
{{--                        @csrf--}}
{{--                        <button class="addToFav btn btn-danger">--}}
{{--                            <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14"--}}
{{--                                fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                    d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z"--}}
{{--                                    stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round"--}}
{{--                                    stroke-linejoin="round" />--}}
{{--                            </svg>--}}
{{--                            <p>Отказаться</p>--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                @endif--}}
{{--            @endif--}}
{{--        </div>--}}
    </div>

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
