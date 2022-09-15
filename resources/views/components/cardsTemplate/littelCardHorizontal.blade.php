<div class="card">

    @if(Request::is('yourfavoritelist'))

    @endif


    <div class="card__content card__content--horizontal">
        <div class="card__img card__img--horizontal">
            <img @if(count($item->imageMain)) src="{{Storage::url($item->imageMain[0]->path)}}"
                 @elseif(count($item->images)) src="{{Storage::url($item->images[0]->path)}}"
                 @else src="{{ asset('images/product/placeholder400x400.png' )}}"
                 @endif alt="{{ $item['title'] }}" title="{{ $item['title'] }}">
        </div>

        <div class="card__body card__body--horizontal">

            <div class="card__body-top card__body-top--horizontal">
                <a class="card__link--title" href="{{ route('ad.show', $item['id']) }}">
                    <h4 class="card__title card__title--horizontal">{{ $item['title']  }}</h4>
                </a>

                <div class="card__item card__location card__location--horizontal">
                    <p class="card__item-title">Город подачи:</p>
                    <p class="card__item-text">{{ $item->city->name }}</p>
                </div>

                <div class="card__item card__category">
                    <p class="card__item-title">Категория:</p>
                    <p class="card__item-text">{{ $item->category->title }}</p>
                </div>

                <div class="card__item card__add card__add--horizontal">
                    <p class="card__add-text">Опубликовано:</p>
                    <p class="card__add-time">{{ $item->getCreatedDate() }}</p>
                </div>
            </div>

            <div class="card__body-bottom card__body-buttons">

                <a href="{{ route('ad.show', $item->id) }}" class="btn  btn-white">Просмотр</a>
                <a href="{{ route('user.profile.editAd', ['ad' => $item->id]) }}" class="btn  btn-white">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.16504 13.1287H13.0001" stroke="#23262F" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.52001 2.02986C8.0371 1.41186 8.96666 1.32124 9.59748 1.82782C9.63236 1.85531 10.753 2.72586 10.753 2.72586C11.446 3.14479 11.6613 4.0354 11.2329 4.71506C11.2102 4.75146 4.87463 12.6763 4.87463 12.6763C4.66385 12.9393 4.34389 13.0945 4.00194 13.0982L1.57569 13.1287L1.02902 10.8149C0.952442 10.4895 1.02902 10.1478 1.2398 9.8849L7.52001 2.02986Z"
                              stroke="#23262F" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.34766 3.50049L9.98249 6.2919" stroke="#23262F" stroke-width="1.25"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span class="btn-text">Изменить</span>
                </a>
                <form action="{{ route('ad.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="card__body-btn btn-reset btn-del">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.1042 8.39062C16.1042 8.39062 15.6517 14.0031 15.3892 16.3673C15.2642 17.4965 14.5667 18.1581 13.4242 18.179C11.25 18.2181 9.07332 18.2206 6.89999 18.1748C5.80082 18.1523 5.11499 17.4823 4.99249 16.3731C4.72832 13.9881 4.27832 8.39062 4.27832 8.39062"
                                  stroke="#EF4646" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.2567 5.69987H3.125" stroke="#EF4646" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M14.5335 5.69998C13.8793 5.69998 13.316 5.23748 13.1877 4.59665L12.9852 3.58331C12.8602 3.11581 12.4368 2.79248 11.9543 2.79248H8.42682C7.94432 2.79248 7.52099 3.11581 7.39599 3.58331L7.19349 4.59665C7.06516 5.23748 6.50182 5.69998 5.84766 5.69998"
                                  stroke="#EF4646" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>

            </div>

        </div>

        <div class="card__info info">
            <div class="info__top status-info">
                <div class="status-info__item status-info__item-active">
                    <span class="status-info__text">в архиве!</span>
                </div>
            </div>

            <div class="info__bottom">
                <div class="info__watch">
                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M11.6354 7.04418C11.6354 8.49918 10.4554 9.67835 9.00038 9.67835C7.54538 9.67835 6.36621 8.49918 6.36621 7.04418C6.36621 5.58835 7.54538 4.40918 9.00038 4.40918C10.4554 4.40918 11.6354 5.58835 11.6354 7.04418Z"
                              stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M8.99866 13.129C12.172 13.129 15.0745 10.8473 16.7087 7.04398C15.0745 3.24065 12.172 0.958984 8.99866 0.958984H9.00199C5.82866 0.958984 2.92616 3.24065 1.29199 7.04398C2.92616 10.8473 5.82866 13.129 9.00199 13.129H8.99866Z"
                              stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>

                    <span class="info__text--gray">{{$item->show_count}}</span>
                </div>

                <div class="info__fav">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M14.449 4.12787C14.449 1.83547 12.8818 0.916504 10.6253 0.916504H5.32623C3.1391 0.916504 1.5 1.77281 1.5 3.97498V16.2448C1.5 16.8497 2.15079 17.2306 2.67794 16.9349L7.99624 13.9516L13.2686 16.9299C13.7966 17.2273 14.449 16.8463 14.449 16.2406V4.12787Z"
                              stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M4.89258 6.52318H10.9912" stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span class="info__text--gray">0</span>
                </div>
            </div>
        </div>
    </div>

</div>


{{--@forelse ($ads as $ad)--}}

{{-- <div style="height: 400px;" class="d-flex gap-5 mb-4 box-shadow bg-light ">--}}

{{-- @if ( $ad->status->title == 'archived')--}}
{{-- <h1 class="position-absolute start-50 top-50 opacity-50 text-danger">в архиве</h1>--}}
{{-- @endif--}}

{{-- <div class="">--}}
{{-- <div class="d-flex flex-column ">--}}
{{-- <small class="text-muted">Статус: {{ $ad->status->description }}</small>--}}
{{-- <small class="text-muted">Просмотрели: {{ $ad->show_count }}</small>--}}
{{-- <small class="text-muted">Добавили в--}}
{{-- избранное: {{ count($ad->favoriteUsers) }}</small>--}}
{{-- <small class="text-muted">Откликнулись: {{ count($ad->usersWished) }}</small>--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- <div class="w-25">--}}
{{-- <h5>Кто захотел ваши объявления</h5>--}}
{{-- <div class="d-flex flex-column gap-1">--}}
{{-- @forelse ($ad->usersWished as $adAdded)--}}
{{-- <form action="{{ route('chat.from.ad') }}" method="post">--}}
{{-- <input type="hidden" name="ad_user_id" value="{{$adAdded->id}}">--}}
{{-- @csrf--}}
{{-- @method('POST')--}}
{{-- <button type="submit" class="btn btn-success w-100"><p>{{ $adAdded->name }}</p></button>--}}
{{-- </form>--}}

{{-- @empty--}}
{{-- <h3></h3>--}}
{{-- @endforelse--}}
{{-- </div>--}}
{{-- </div>--}}

{{-- </div>--}}


{{--@endforelse--}}