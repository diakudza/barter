@extends('components.base')

@section('title', 'Просмотр обьявления')

@section('content')

<div class="mt-5 mb-5">
</div>

<div class="container">

    <div id="content" class="mb-5">

        <h1 class="productName">{{ $ad->title }}</h1>
        <div class="productHeader">
            <div class="location">
                <p class="productLocation">
                    <svg style="margin-right: 12.5px" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Категория: {{ $ad->category->title }}
                </p>
                <p class="productLocation">
                    <svg style="margin-right: 12.5px" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Город: {{ $ad->city->name }}
                </p>
                <p class="productLocation">
                    <svg style="margin-right: 12.5px" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 10.5005C14.5 9.11924 13.3808 8 12.0005 8C10.6192 8 9.5 9.11924 9.5 10.5005C9.5 11.8808 10.6192 13 12.0005 13C13.3808 13 14.5 11.8808 14.5 10.5005Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9995 21C10.801 21 4.5 15.8984 4.5 10.5633C4.5 6.38664 7.8571 3 11.9995 3C16.1419 3 19.5 6.38664 19.5 10.5633C19.5 15.8984 13.198 21 11.9995 21Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Дата создания: {{ $ad['created_at'] }}
                </p>
            </div>

            <div class="add">
                @if (auth()->user())
                @if (!$userFavorite)
                <form action="{{ route('favorite.store', ['ad_id' => $ad['id']]) }}" method="post">
                    @method('POST')
                    @csrf
                    <button class="addToFav btn btn-success">
                        <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Добавить в избранное</p>
                    </button>
                </form>
                @else
                <form action="{{ route('favorite.destroy', $ad->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="ad_id" value="{{ $ad->id }}" />
                    <button class="addToFav btn btn-danger">
                        <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Убрать из избранного</p>
                    </button>
                </form>
                @endif
                @if (!$userWishes)
                <form action="{{ route('wishlist.store', ['ad_id' => $ad['id']]) }}" method="post">
                    @method('POST')
                    @csrf
                    <button class="addToFav btn btn-danger">
                        <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Хочу это</p>
                    </button>
                </form>
                @else
                <form action="{{ route('wishlist.destroy', $ad['id']) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="addToFav btn btn-danger">
                        <svg style="margin-right: 10.84px" width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.159 3.10235C11.159 1.26844 9.90523 0.533264 8.10006 0.533264H3.86079C2.11108 0.533264 0.799805 1.21831 0.799805 2.98005V12.7959C0.799805 13.2798 1.32044 13.5846 1.74216 13.348L5.9968 10.9613L10.2147 13.344C10.6371 13.5819 11.159 13.2771 11.159 12.7926V3.10235Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.51367 5.01862H8.39254" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Отказаться</p>
                    </button>
                </form>
                @endif
                @endif
            </div>

            <div id="productCart" class="productCart">

                <div class="productView">
                    <div class="productImg">
                        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></SCRIPT>
                        @if($ad->images && count($ad->images) >= 1)
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-inner">
                                <div class="productViewBig">
                                    <div class="carousel-item active">
                                        <img class="image modalWindow d-block w-100" src="{{ Storage::url($ad->images[0]->path) }}" alt="...">
                                    </div>
                                    @foreach($ad->images as $image)
                                        @if ($loop->first) @continue @endif
                                        <div class="carousel-item">
                                            <img class="image modalWindow d-block w-100" src="{{ Storage::url($image->path) }}" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="carousel-indicators productViewSmall">
                                @foreach($ad->images as $image)
                                    @if ($loop->first)
                                        <img src="{{ Storage::url($image->path) }}" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="active" aria-current="true" aria-label="Slide {{ $loop->iteration }}">
                                        @continue
                                    @endif
                                    <img src="{{ Storage::url($image->path) }}" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" aria-label="Slide {{ $loop->iteration }}">
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        @else
                                    <div class="productViewBig">
                                            <img class="image modalWindow" src="{{ Storage::url('images/clean.webp') }}" alt="...">
                                    </div>
                        @endif
                    </div>
                    @else
                    <div class="productViewBig">
                        <img src="{{ Storage::url('images/clean.webp') }}" height="400" alt="image">
                    </div>
                    @endif
                </div>


                    <div class="productContact">
                        <div class="status">
                            <svg style="margin-right: 9.67px" width="18" height="16" viewBox="0 0 18 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                      d="M9.8139 0.594596L11.6693 4.32315C11.806 4.59329 12.0669 4.78089 12.3678 4.82258L16.5353 5.42955C16.7787 5.46373 16.9996 5.59213 17.1488 5.78806C17.2963 5.9815 17.3597 6.22662 17.3238 6.46758C17.2947 6.66768 17.2005 6.85277 17.0563 6.99451L14.0365 9.92183C13.8156 10.1261 13.7156 10.4288 13.7689 10.7247L14.5124 14.8402C14.5916 15.3371 14.2624 15.8056 13.7689 15.8999C13.5655 15.9324 13.3572 15.8982 13.1738 15.8048L9.45632 13.868C9.18043 13.7288 8.85453 13.7288 8.57864 13.868L4.86118 15.8048C4.40441 16.0474 3.83846 15.8824 3.58424 15.4321C3.49005 15.2529 3.45671 15.0486 3.48755 14.8493L4.23104 10.7331C4.28439 10.4379 4.18353 10.1336 3.96348 9.92933L0.943673 7.00368C0.584429 6.65684 0.573593 6.08572 0.919501 5.72637C0.927002 5.71886 0.935337 5.71053 0.943673 5.70219C1.08704 5.55628 1.27541 5.46373 1.47879 5.43955L5.64634 4.83175C5.94641 4.78922 6.2073 4.6033 6.34483 4.33149L8.13354 0.594596C8.29274 0.274434 8.62281 0.0751662 8.98122 0.0835038H9.09291C9.40381 0.121023 9.6747 0.313621 9.8139 0.594596Z"
                                      fill="#9757D7"/>
                                <path
                                    d="M8.99366 13.7642C8.83224 13.7692 8.67498 13.8125 8.53354 13.8901L4.83425 15.8225C4.38162 16.0385 3.83996 15.8709 3.58618 15.438C3.49216 15.2612 3.45805 15.0586 3.48967 14.8601L4.22852 10.7525C4.27845 10.454 4.1786 10.1504 3.96144 9.9402L0.940273 7.01531C0.58166 6.66419 0.575004 6.08788 0.926128 5.72842C0.93112 5.72342 0.935281 5.71925 0.940273 5.71508C1.08339 5.57329 1.2681 5.47988 1.46696 5.45069L5.63801 4.83686C5.94005 4.79849 6.20214 4.61001 6.33527 4.33645L8.1483 0.552517C8.32053 0.247267 8.65086 0.0654511 9.00032 0.0846335C8.99366 0.332336 8.99366 13.5957 8.99366 13.7642Z"
                                    fill="#9757D7"/>
                            </svg>
                            <p>VIP</p>
                        </div>
                        <div class="user">
                            <div class="userInfo">
                                <div class="userView">
                                    <img src="{{ Storage::url("images/ads/2/Afshin.png") }}">
                                    <div class="userName">
                                        <h5 class="">{{ $ad->user->name }}</h5>
                                        <div class="userRating">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.45203 7.35331C9.30094 7.49973 9.23153 7.71148 9.26594 7.91915L9.78453 10.7891C9.82828 11.0324 9.72561 11.2786 9.52203 11.4191C9.32253 11.565 9.05711 11.5825 8.83953 11.4658L6.25594 10.1183C6.16611 10.0705 6.06636 10.0448 5.96428 10.0419H5.80619C5.75136 10.0501 5.69769 10.0676 5.64869 10.0944L3.06453 11.4483C2.93678 11.5125 2.79211 11.5352 2.65036 11.5125C2.30503 11.4471 2.07461 11.1181 2.13119 10.7711L2.65036 7.90106C2.68478 7.69165 2.61536 7.47873 2.46428 7.32998L0.35786 5.28831C0.181693 5.1174 0.120443 4.86073 0.200943 4.62915C0.27911 4.39815 0.47861 4.22956 0.719527 4.19165L3.61869 3.77106C3.83919 3.74831 4.03286 3.61415 4.13203 3.41581L5.40953 0.796646C5.43986 0.738313 5.47894 0.684646 5.52619 0.639146L5.57869 0.598313C5.60611 0.56798 5.63761 0.542896 5.67261 0.52248L5.73619 0.499146L5.83536 0.458313H6.08094C6.30028 0.481063 6.49336 0.612313 6.59428 0.808313L7.88869 3.41581C7.98203 3.60656 8.16344 3.73898 8.37286 3.77106L11.272 4.19165C11.517 4.22665 11.7218 4.39581 11.8029 4.62915C11.8793 4.86306 11.8134 5.11973 11.6337 5.28831L9.45203 7.35331Z"
                                                    fill="#F6BF4D"/>
                                            </svg>
                                            <p>4.9</p>
                                            <p>(84 отзыва)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="contacts">
                            <div>
                                <svg style="margin-right: 6px" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1673 8.00024C14.1673 11.4062 11.4067 14.1669 8.00067 14.1669C4.59466 14.1669 1.83398 11.4062 1.83398 8.00024C1.83398 4.59423 4.59466 1.83356 8.00067 1.83356C11.4067 1.83356 14.1673 4.59423 14.1673 8.00024Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.2878 9.96182L7.77441 8.46248V5.23114" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                На сайте с {{ $ad->user->created_at }}
                            </div>
                            <div class="contactsInfo">
                                <p>
                                    <svg style="margin-right: 10px" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.68719 8.31484C10.3466 10.9735 10.9499 7.89772 12.6431 9.58979C14.2756 11.2218 15.2138 11.5487 13.1455 13.6164C12.8865 13.8246 11.2404 16.3294 5.45576 10.5464C-0.329641 4.76257 2.17374 3.11486 2.382 2.85587C4.45527 0.78246 4.7766 1.72615 6.40902 3.35812C8.10227 5.0509 5.0278 5.65618 7.68719 8.31484Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Номер Телефона
                                </p>
                                <h6>+7 929 184 84 43</h6>
                            </div>
                            <div class="contactsInfo">
                                <p>
                                    <svg style="margin-right: 10px" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 13.9999L3.1 11.4666C2.25844 10.272 1.88178 8.81127 2.0407 7.35866C2.19961 5.90604 2.88319 4.56134 3.96314 3.57693C5.04309 2.59252 6.44517 2.03606 7.90625 2.01198C9.36734 1.98791 10.787 2.49787 11.8988 3.44617C13.0106 4.39446 13.7381 5.7159 13.9448 7.1625C14.1515 8.60909 13.8231 10.0814 13.0214 11.3031C12.2197 12.5248 10.9996 13.4119 9.59026 13.798C8.1809 14.1841 6.67908 14.0425 5.36667 13.3999L2 13.9999" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M6 6.66663C6 6.75503 6.03512 6.83982 6.09763 6.90233C6.16014 6.96484 6.24493 6.99996 6.33333 6.99996C6.42174 6.99996 6.50652 6.96484 6.56904 6.90233C6.63155 6.83982 6.66667 6.75503 6.66667 6.66663V5.99996C6.66667 5.91155 6.63155 5.82677 6.56904 5.76426C6.50652 5.70174 6.42174 5.66663 6.33333 5.66663C6.24493 5.66663 6.16014 5.70174 6.09763 5.76426C6.03512 5.82677 6 5.91155 6 5.99996V6.66663ZM6 6.66663C6 7.55068 6.35119 8.39853 6.97631 9.02365C7.60143 9.64877 8.44928 9.99996 9.33333 9.99996H10C10.0884 9.99996 10.1732 9.96484 10.2357 9.90233C10.2982 9.83982 10.3333 9.75503 10.3333 9.66663C10.3333 9.57822 10.2982 9.49344 10.2357 9.43092C10.1732 9.36841 10.0884 9.33329 10 9.33329H9.33333C9.24493 9.33329 9.16014 9.36841 9.09763 9.43092C9.03512 9.49344 9 9.57822 9 9.66663C9 9.75503 9.03512 9.83982 9.09763 9.90233C9.16014 9.96484 9.24493 9.99996 9.33333 9.99996" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Email
                                </p>
                                <h6>{{ $ad->user->email }}</h6>
                            </div>
                        </div>
                        <button class="writeMessage">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7139 12.7132C10.6765 14.7508 7.65952 15.191 5.19062 14.0493C4.82615 13.9025 4.52733 13.7839 4.24326 13.7839C3.452 13.7886 2.46712 14.5558 1.95525 14.0446C1.44338 13.5326 2.21118 12.547 2.21118 11.751C2.21118 11.4668 2.09728 11.1734 1.95056 10.8082C0.808228 8.33967 1.24908 5.32171 3.28651 3.28472C5.88741 0.682873 10.113 0.682873 12.7139 3.28405C15.3195 5.88992 15.3148 10.112 12.7139 12.7132Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.6262 8.27523H10.6322" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.95338 8.27523H7.95938" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5.28053 8.27523H5.28653" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Написать продавцу
                        </button>
                        <button class="orderCall">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.18815 8.31488C10.8475 10.9735 11.4508 7.89777 13.1441 9.58983C14.7765 11.2218 15.7147 11.5488 13.6465 13.6164C13.3874 13.8246 11.7414 16.3295 5.95673 10.5464C0.17134 4.76263 2.67472 3.11492 2.88297 2.85593C4.95624 0.782523 5.27757 1.72621 6.90999 3.35818C8.60323 5.05096 5.52876 5.65624 8.18815 8.31488Z" stroke="#23262F" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Забронировать Звонок
                        </button>
                        <div class="additionalInfo">
                            <p class="review">
                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6344 7.04413C11.6344 8.49913 10.4544 9.6783 8.99941 9.6783C7.5444 9.6783 6.36523 8.49913 6.36523 7.04413C6.36523 5.58829 7.5444 4.40912 8.99941 4.40912C10.4544 4.40912 11.6344 5.58829 11.6344 7.04413Z" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.9977 13.129C12.171 13.129 15.0735 10.8473 16.7077 7.04394C15.0735 3.2406 12.171 0.958923 8.9977 0.958923H9.00103C5.82769 0.958923 2.92519 3.2406 1.29102 7.04394C2.92519 10.8473 5.82769 13.129 9.00103 13.129H8.9977Z" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                просмотров {{ $ad['show_count'] }}
                            </p>
                            <p class="saved">
                                <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.4491 4.128C14.4491 1.83559 12.8818 0.916626 10.6253 0.916626H5.32624C3.1391 0.916626 1.5 1.77294 1.5 3.97511V16.245C1.5 16.8498 2.1508 17.2308 2.67795 16.935L7.99626 13.9517L13.2686 16.93C13.7966 17.2274 14.4491 16.8465 14.4491 16.2408V4.128Z" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.89258 6.5233H10.9912" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                пожелали:
                                @if ($inwishlist)
                                {{ $inwishlist }}
                                @else
                                0
                                @endif

                            </p>
                            <p class="favorit">
                                <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.4491 4.128C14.4491 1.83559 12.8818 0.916626 10.6253 0.916626H5.32624C3.1391 0.916626 1.5 1.77294 1.5 3.97511V16.245C1.5 16.8498 2.1508 17.2308 2.67795 16.935L7.99626 13.9517L13.2686 16.93C13.7966 17.2274 14.4491 16.8465 14.4491 16.2408V4.128Z" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.89258 6.5233H10.9912" stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                в избранном:
                                @if ($infavorites)
                                {{ $infavorites }}
                                @else
                                0
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="productInfo">
            <div class="characteristic">
                <svg width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9325 14.3866C10.3325 14.3866 6.45117 15.1383 6.45117 18.0393C6.45117 20.9415 10.3575 21.6667 14.9325 21.6667C19.5325 21.6667 23.4138 20.9151 23.4138 18.0141C23.4138 15.1118 19.5074 14.3866 14.9325 14.3866Z" fill="#315DF7" />
                    <path opacity="0.4" d="M14.9317 11.6228C18.0466 11.6228 20.5442 9.11083 20.5442 5.97808C20.5442 2.84413 18.0466 0.333374 14.9317 0.333374C11.8169 0.333374 9.31934 2.84413 9.31934 5.97808C9.31934 9.11083 11.8169 11.6228 14.9317 11.6228Z" fill="#315DF7" />
                    <path opacity="0.4" d="M27.1171 7.29233C27.923 4.12236 25.5603 1.27539 22.5517 1.27539C22.2246 1.27539 21.9118 1.31141 21.6062 1.37265C21.5656 1.38226 21.5202 1.40267 21.4964 1.43869C21.4689 1.48432 21.4892 1.54556 21.519 1.58518C22.4228 2.86038 22.9421 4.41294 22.9421 6.07958C22.9421 7.67657 22.4658 9.1655 21.6301 10.4011C21.5441 10.5283 21.6205 10.7 21.7721 10.7265C21.9823 10.7637 22.1972 10.7829 22.4168 10.7889C24.6076 10.8465 26.5739 9.42846 27.1171 7.29233Z" fill="#315DF7" />
                    <path d="M29.4135 14.756C29.0124 13.8963 28.0442 13.3067 26.5721 13.0173C25.8773 12.8468 23.9969 12.6067 22.2479 12.6391C22.2216 12.6427 22.2073 12.6607 22.2049 12.6727C22.2013 12.6895 22.2085 12.7183 22.2431 12.7363C23.0514 13.1386 26.1758 14.8881 25.783 18.578C25.7663 18.7377 25.894 18.8758 26.0528 18.8517C26.8216 18.7413 28.7999 18.3138 29.4135 16.9822C29.7526 16.2785 29.7526 15.4608 29.4135 14.756Z" fill="#315DF7" />
                    <path opacity="0.4" d="M8.39411 1.37302C8.08967 1.31058 7.77568 1.27576 7.44856 1.27576C4.43999 1.27576 2.07732 4.12273 2.88437 7.2927C3.42639 9.42883 5.39271 10.8469 7.58347 10.7893C7.80314 10.7833 8.01923 10.7629 8.22816 10.7268C8.37978 10.7004 8.45619 10.5287 8.37023 10.4014C7.53452 9.16466 7.05816 7.67694 7.05816 6.07994C7.05816 4.41211 7.57869 2.85954 8.48246 1.58555C8.51111 1.54592 8.5326 1.48469 8.50395 1.43906C8.48007 1.40184 8.43589 1.38262 8.39411 1.37302Z" fill="#315DF7" />
                    <path d="M3.4294 13.0171C1.95736 13.3064 0.990317 13.896 0.589175 14.7557C0.248921 15.4606 0.248921 16.2783 0.589175 16.9831C1.20283 18.3135 3.18108 18.7422 3.94993 18.8515C4.10872 18.8755 4.23527 18.7386 4.21856 18.5777C3.82577 14.889 6.95014 13.1395 7.75959 12.7373C7.79302 12.7181 7.80018 12.6905 7.7966 12.6724C7.79421 12.6604 7.78108 12.6424 7.75481 12.64C6.00459 12.6064 4.12543 12.8466 3.4294 13.0171Z" fill="#315DF7" />
                </svg>
                <div>
                    <p>Пожелали:</p>
                    <h5>@if ($inwishlist)
                        {{ $inwishlist }}
                        @else
                        0
                        @endif
                    </h5>
                </div>
            </div>
            <div class="characteristic">
                <svg width="21" height="21" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.45203 7.35331C9.30094 7.49973 9.23153 7.71148 9.26594 7.91915L9.78453 10.7891C9.82828 11.0324 9.72561 11.2786 9.52203 11.4191C9.32253 11.565 9.05711 11.5825 8.83953 11.4658L6.25594 10.1183C6.16611 10.0705 6.06636 10.0448 5.96428 10.0419H5.80619C5.75136 10.0501 5.69769 10.0676 5.64869 10.0944L3.06453 11.4483C2.93678 11.5125 2.79211 11.5352 2.65036 11.5125C2.30503 11.4471 2.07461 11.1181 2.13119 10.7711L2.65036 7.90106C2.68478 7.69165 2.61536 7.47873 2.46428 7.32998L0.35786 5.28831C0.181693 5.1174 0.120443 4.86073 0.200943 4.62915C0.27911 4.39815 0.47861 4.22956 0.719527 4.19165L3.61869 3.77106C3.83919 3.74831 4.03286 3.61415 4.13203 3.41581L5.40953 0.796646C5.43986 0.738313 5.47894 0.684646 5.52619 0.639146L5.57869 0.598313C5.60611 0.56798 5.63761 0.542896 5.67261 0.52248L5.73619 0.499146L5.83536 0.458313H6.08094C6.30028 0.481063 6.49336 0.612313 6.59428 0.808313L7.88869 3.41581C7.98203 3.60656 8.16344 3.73898 8.37286 3.77106L11.272 4.19165C11.517 4.22665 11.7218 4.39581 11.8029 4.62915C11.8793 4.86306 11.8134 5.11973 11.6337 5.28831L9.45203 7.35331Z" fill="#F6BF4D" />
                </svg>
                <div>
                    <p>Добавили в избранное:</p>
                    <h5>
                        @if ($infavorites)
                        {{ $infavorites }}
                        @else
                        0
                        @endif
                    </h5>
                </div>
            </div>
            <div class="characteristic">
                <svg width="19" height="28" viewBox="0 0 19 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.04282 1.91566C7.95597 0.222991 11.5367 0.252576 14.4225 1.99315C17.28 3.76918 19.0166 6.93887 19.0005 10.3486C18.934 13.7359 17.0717 16.92 14.744 19.3814C13.4005 20.8085 11.8975 22.0704 10.2658 23.1414C10.0977 23.2386 9.91367 23.3036 9.72265 23.3333C9.5388 23.3255 9.35976 23.2712 9.20167 23.1753C6.71056 21.5661 4.52511 19.512 2.75043 17.1119C1.26544 15.1085 0.421765 12.688 0.333986 10.1792C0.332058 6.76296 2.12968 3.60832 5.04282 1.91566ZM6.72621 11.593C7.21624 12.8011 8.37291 13.5891 9.65614 13.5891C10.4968 13.5951 11.3049 13.2584 11.9004 12.6539C12.4959 12.0495 12.8293 11.2275 12.8263 10.3712C12.8308 9.06402 12.0613 7.88306 10.877 7.37967C9.69276 6.87628 8.32739 7.14977 7.41842 8.07244C6.50945 8.9951 6.23618 10.3849 6.72621 11.593Z" fill="#9757D7" />
                    <ellipse opacity="0.4" cx="9.66766" cy="26" rx="6.66668" ry="1.33334" fill="#9757D7" />
                </svg>
                <div>
                    <p>Время до метро</p>
                    <h5>~15 минут</h5>
                </div>
            </div>
        </div>
        <div class="description">
            <h2>Описание</h2>
            <p>
                {{ $ad['text'] }}
            </p>
        </div>

    </div>

</div>
@endsection