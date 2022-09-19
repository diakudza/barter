<div class="card">

    <a href="{{ route('ad.show', $item['id']) }}" class="card__link"></a>

    <div class="card__content">
        <div class="card__img">

            <div class="card__img-info">
                @if ($item->barter_type == 'barter')
                    <span class="status-info__text">Обменяю</span>
                @elseif ($item->barter_type != 'barter')
                    <span class="status-info__text">Отдам даром</span>
                @endif
            </div>

            @if(auth()->user() && $item['status_id'] !== 4)
                <button class="card__btn-fav btn-reset" >
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3
        .org/2000/svg">
                        <path d="M12.62 20.81C12.28 20.93 11.72 20.93 11.38 20.81C8.48 19.82 2 15.69 2 8.68998C2 5.59998 4.49 3.09998 7.56 3.09998C9.38 3.09998 10.99 3.97998 12 5.33998C13.01 3.97998 14.63 3.09998 16.44 3.09998C19.51 3.09998 22 5.59998 22 8.68998C22 15.69 15.52 19.82 12.62 20.81Z"
                              stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            @endif

            <img class="card__product-img" @if(count($item->imageMain)) src="{{Storage::url
            ($item->imageMain[0]->path)}}"
                 @elseif(count($item->images)) src="{{Storage::url($item->images[0]->path)}}"
                 @else src="{{ asset('images/product/placeholder400x400.png' )}}"
                 @endif alt="{{ $item['title'] }}" title="{{ $item['title'] }}">

        </div>

        <div class="card__body">

            <div class="card__body-top">
                <a class="card__link--title" href="{{ route('ad.show', $item['id']) }}">
                    <h4 class="card__title">{{ Str::limit($item['title'], 55)  }}</h4>
                </a>

                <div class="card__location">
                    <svg class="card__location-icon" width="14" height="18" viewBox="0 0 14 18" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M9.08332 7.7505C9.08332 6.59944 8.15063 5.66675 7.00041 5.66675C5.84935 5.66675 4.91666 6.59944 4.91666 7.7505C4.91666 8.90072 5.84935 9.83341 7.00041 9.83341C8.15063 9.83341 9.08332 8.90072 9.08332 7.7505Z"
                              stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M6.99959 16.5C6.00086 16.5 0.75 12.2486 0.75 7.80274C0.75 4.3222 3.54758 1.5 6.99959 1.5C10.4516 1.5 13.25 4.3222 13.25 7.80274C13.25 12.2486 7.99832 16.5 6.99959 16.5Z"
                              stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    <p class="card__location-text">{{ $item->city->name }}</p>
                </div>

            </div>

            <div class="card__body-bottom">
                <div class="card__author">
                    <div class="card__author-img">
                        <img class="author-img"
                             @if($item->user->avatar()->first())
                                 src="{{Storage::url($item->user->avatar()->first()->path)}}"
                             @else src="{{ asset('images/icon-avatar.png')}}"
                             @endif alt="{{ $item->user->name }}">
                    </div>

                    <a href="{{ route('user.public', $item->user->id) }}" class="card__author-link">
                        <p class="card__author-name">{{ $item->user->name }}</p>
                    </a>
                </div>

                <div class="card__add">
                    <p class="card__add-text">Опубликовано:</p>
                    <p class="card__add-time">{{ $item->getCreatedDate() }}</p>
                </div>
            </div>

        </div>
    </div>

</div>