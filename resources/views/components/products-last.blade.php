<div class="products-last__list">
    @foreach($lastTenAds as $ad)

        <div class="products-last__card card">

            <div class="card__img">
                <img @if(count($ad->imageMain)) src="{{Storage::url($ad->imageMain[0]->path)}}"
                     @elseif(count($ad->images))

                     src="{{Storage::url($ad->images->path)}}"
                     @else
                        src="https://via.placeholder.com/400x400"
                @endif alt="{{ $ad['title'] }}" title="{{ $ad['title'] }}">
            </div>

            <div class="card__body">

                <div class="card__body-top">
                    <a class="card__link" href="{{ route('ad.show', $ad['id']) }}">
                        <h4 class="card__title">{{ $ad['title']  }}</h4>
                    </a>

                    <div class="card__location">
                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M9.08332 7.7505C9.08332 6.59944 8.15063 5.66675 7.00041 5.66675C5.84935 5.66675 4.91666 6.59944 4.91666 7.7505C4.91666 8.90072 5.84935 9.83341 7.00041 9.83341C8.15063 9.83341 9.08332 8.90072 9.08332 7.7505Z"
                                  stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M6.99959 16.5C6.00086 16.5 0.75 12.2486 0.75 7.80274C0.75 4.3222 3.54758 1.5 6.99959 1.5C10.4516 1.5 13.25 4.3222 13.25 7.80274C13.25 12.2486 7.99832 16.5 6.99959 16.5Z"
                                  stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <p class="card__location-text">{{ $ad->city->name  }}</p>
                    </div>
                </div>

                <div class="card__body-bottom">
                    <div class="card__author">
                        <div class="card__author-img">
                            <img src="" alt="Автор">
                        </div>
                        <p class="card__author-name">{{ $ad->user->name }}</p>
                    </div>

                    <div class="card__add">
                        <p class="card__add-text">Опубликовано:</p>
                        <p class="class__add-time">{{ $ad['created_at']  }}</p>
                    </div>
                </div>


            </div>


        </div>

    @endforeach()
</div>
