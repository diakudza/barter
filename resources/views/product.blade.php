@extends('components.base')

@section('title',"Карточка товара")

@section('content')

<div class="container">

  <div id="content" class="mb-5">

      <h1 class="productName">Прекрасный дом с отличным видом</h1>

      <div class="productHeader">
                <p class="productLocation">
                    <svg  style="margin-right: 12.5px" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    8723 New York st. Alihey 187921 </p>
                <button class="addToFav">
                    <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p>Добавить в избранное</p>
                </button>
      </div>

      <div id="productCart" class="productCart">
        <div class="productView">
            <div class="productImg">
                <div class="productViewBig">
                    <img src="images/product/house0.png">
                </div>
                <div class="productViewSmall">
                    <img src="images/product/house1.png">
                    <img src="images/product/house2.png">
                    <img src="images/product/house3.png">
                    <img src="images/product/house4.png">
                    <img src="images/product/house4.png">
                </div>
            </div>
            <div class="productContact">
                <div class="status">
                    <svg style="margin-right: 9.67px" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M9.8139 0.594596L11.6693 4.32315C11.806 4.59329 12.0669 4.78089 12.3678 4.82258L16.5353 5.42955C16.7787 5.46373 16.9996 5.59213 17.1488 5.78806C17.2963 5.9815 17.3597 6.22662 17.3238 6.46758C17.2947 6.66768 17.2005 6.85277 17.0563 6.99451L14.0365 9.92183C13.8156 10.1261 13.7156 10.4288 13.7689 10.7247L14.5124 14.8402C14.5916 15.3371 14.2624 15.8056 13.7689 15.8999C13.5655 15.9324 13.3572 15.8982 13.1738 15.8048L9.45632 13.868C9.18043 13.7288 8.85453 13.7288 8.57864 13.868L4.86118 15.8048C4.40441 16.0474 3.83846 15.8824 3.58424 15.4321C3.49005 15.2529 3.45671 15.0486 3.48755 14.8493L4.23104 10.7331C4.28439 10.4379 4.18353 10.1336 3.96348 9.92933L0.943673 7.00368C0.584429 6.65684 0.573593 6.08572 0.919501 5.72637C0.927002 5.71886 0.935337 5.71053 0.943673 5.70219C1.08704 5.55628 1.27541 5.46373 1.47879 5.43955L5.64634 4.83175C5.94641 4.78922 6.2073 4.6033 6.34483 4.33149L8.13354 0.594596C8.29274 0.274434 8.62281 0.0751662 8.98122 0.0835038H9.09291C9.40381 0.121023 9.6747 0.313621 9.8139 0.594596Z" fill="#9757D7"/>
                        <path d="M8.99366 13.7642C8.83224 13.7692 8.67498 13.8125 8.53354 13.8901L4.83425 15.8225C4.38162 16.0385 3.83996 15.8709 3.58618 15.438C3.49216 15.2612 3.45805 15.0586 3.48967 14.8601L4.22852 10.7525C4.27845 10.454 4.1786 10.1504 3.96144 9.9402L0.940273 7.01531C0.58166 6.66419 0.575004 6.08788 0.926128 5.72842C0.93112 5.72342 0.935281 5.71925 0.940273 5.71508C1.08339 5.57329 1.2681 5.47988 1.46696 5.45069L5.63801 4.83686C5.94005 4.79849 6.20214 4.61001 6.33527 4.33645L8.1483 0.552517C8.32053 0.247267 8.65086 0.0654511 9.00032 0.0846335C8.99366 0.332336 8.99366 13.5957 8.99366 13.7642Z" fill="#9757D7"/>
                    </svg>
                    <p>VIP</p>
                </div>
                <div class="user">

                </div>
            </div>
        </div>

      </div>
      <div class="productInfo"></div>
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
