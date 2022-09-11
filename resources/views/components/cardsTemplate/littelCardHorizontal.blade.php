<div class="card">

    <a href="{{ route('ad.show', $item['id']) }}" class="card__link"></a>

    <div class="card__content card__content--horizontal">
        <div class="card__img card__img--horizontal">

{{--            @if(count($item->imageMain))--}}
{{--                <img src="{{Storage::url($item->imageMain[0]->path)}}" alt="{{ $item['title'] }}"--}}
{{--                     title="{{ $item['title'] }}">--}}
{{--            @elseif(count($item->images))--}}
{{--                <img src="{{Storage::url($item->images[0]->path)}}" alt="{{ $item['title'] }}"--}}
{{--                     title="{{ $item['title'] }}">--}}
{{--            @else--}}
{{--                <img src="{{ asset('images/product/placeholder400x400.png' )}}" alt="{{ $item['title'] }}"--}}
{{--                     title="{{ $item['title'] }}">--}}
{{--            @endif--}}

            <img src="{{ asset('images/product/placeholder400x400.png' )}}" alt="{{ $item['title'] }}"
                 title="{{ $item['title'] }}">

        </div>

        <div class="card__body card__body--horizontal">

            <div class="card__body-top card__body-top--horizontal">
                <a class="card__link--title" href="{{ route('ad.show', $item['id']) }}">
                    <h4 class="card__title card__title--horizontal">{{ $item['title']  }}</h4>
                </a>

                <div class="card__add card__add--horizontal">
                    <p class="card__add-text card__add-text--horizontal">Опубликовано:</p>
                    <p class="card__add-time card__add-time--horizontal">{{ $item->getCreatedDate() }}</p>
                </div>

            </div>

            <div class="card__body-bottom">


              <button>Изменить</button>

                <button>
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1042 8.39062C16.1042 8.39062 15.6517 14.0031 15.3892 16.3673C15.2642 17.4965 14.5667 18.1581 13.4242 18.179C11.25 18.2181 9.07332 18.2206 6.89999 18.1748C5.80082 18.1523 5.11499 17.4823 4.99249 16.3731C4.72832 13.9881 4.27832 8.39062 4.27832 8.39062" stroke="#EF4646" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.2567 5.69987H3.125" stroke="#EF4646" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.5335 5.69998C13.8793 5.69998 13.316 5.23748 13.1877 4.59665L12.9852 3.58331C12.8602 3.11581 12.4368 2.79248 11.9543 2.79248H8.42682C7.94432 2.79248 7.52099 3.11581 7.39599 3.58331L7.19349 4.59665C7.06516 5.23748 6.50182 5.69998 5.84766 5.69998" stroke="#EF4646" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>

        </div>

        <div class="card__info">
            {{--            @if($item['status_id'] == 4)--}}
            {{--                <div class="card__img-info">--}}
            {{--                    <span>в архиве!</span>--}}
            {{--                </div>--}}
            {{--            @endif--}}

            {{--            @if(auth()->user() && $item['status_id'] !== 4)--}}
            {{--                <button class="card__btn-fav btn-reset" aria-label="Добавить в избранное">--}}
            {{--                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
            {{--                        <path fill-rule="evenodd" clip-rule="evenodd"--}}
            {{--                              d="M14.449 4.1281C14.449 1.83571 12.8818 0.916748 10.6253 0.916748H5.32622C3.13909 0.916748 1.5 1.77305 1.5 3.97522V16.245C1.5 16.8499 2.15079 17.2308 2.67794 16.9351L7.99623 13.9518L13.2686 16.9301C13.7965 17.2275 14.449 16.8465 14.449 16.2409V4.1281Z"--}}
            {{--                              stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"/>--}}
            {{--                        <path d="M4.89258 6.52342H10.9911" stroke-width="1.25" stroke-linecap="round"--}}
            {{--                              stroke-linejoin="round"/>--}}
            {{--                    </svg>--}}
            {{--                </button>--}}
            {{--            @endif--}}
        </div>

    </div>

</div>
