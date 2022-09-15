<div class="change-product__preview preview-card">
    <h3 class="preview-card__heading change-product__sub-heading">Превью</h3>

    <div class="preview-card__wrapper">
        <div class="preview-card__img">
            <img src="{{ asset('images/product/placeholder400x400.png' )}}" alt="Название товара" title="Название товара">
        </div>

        <div class="preview-card__body">
            <div class="preview-card__top">
                <h4 class="preview-card__title">Название товара</h4>

                <div class="preview-card__location">
                    <svg class="preview-card__location-icon" width="14" height="18" viewBox="0 0 14 18"
                         fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M9.08332 7.7505C9.08332 6.59944 8.15063 5.66675 7.00041 5.66675C5.84935 5.66675 4.91666 6.59944 4.91666 7.7505C4.91666 8.90072 5.84935 9.83341 7.00041 9.83341C8.15063 9.83341 9.08332 8.90072 9.08332 7.7505Z"
                              stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M6.99959 16.5C6.00086 16.5 0.75 12.2486 0.75 7.80274C0.75 4.3222 3.54758 1.5 6.99959 1.5C10.4516 1.5 13.25 4.3222 13.25 7.80274C13.25 12.2486 7.99832 16.5 6.99959 16.5Z"
                              stroke="#23262F" stroke-opacity="0.6" stroke-width="1.25"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <p class="preview-card__location-text">Ваш город</p>
                </div>
            </div>

            <div class="preview-card__bottom">
                <div class="preview-card__author">
                    <div class="preview-card__author-img">
                        {{--Добавить если нет фото аватарки--}}
                        <img class="author-img" src="{{ Storage::url(auth()->user()->avatar()->first()->path) }}" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">
                    </div>

                    <p class="preview-card__author-name">{{ Auth::user()->name }}</p>
                </div>

                <div class="preview-card__add">
                    <p class="preview-card__add-text">Опубликовано:</p>
                    <p class="preview-card__add-time">{{ date("d.m.Y")  }}</p>
                </div>
            </div>
        </div>
    </div>
</div>