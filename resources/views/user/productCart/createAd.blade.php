@extends('components.base')

@section('title', 'Добавить объявление')

@section('content')

<section class="container change-product">

    <h2 class="change-product__heading heading">Добавить новое объявление</h2>
    <div class="line"></div>

    <div class="change-product__wrapper">

        <form action="{{ route('ad.store') }}" class="change-product__form change-form" method="post"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="change-form__group change-item">
                <h3 class="change-item__heading change-product__sub-heading">Основная информация</h3>

                <div class="change-item__list">
                    <div class="change-item__item">
                        <label class="change-item__label" for="title">Название</label>
                        <input class="change-item__input input" type="text" id="title" name="title"
                               placeholder="Пример: Классный рюкзак" value="{{ old('title') }}" required>
                    </div>

                    <div class="change-item__item">
                        <label class="change-item__label" for="text">Описание</label>
                        <textarea class="change-item__input input input__textarea" name="text" id="text" rows="3"
                                  placeholder="Напишите полное описание товара"   required>{{ old('text') }}</textarea>
                    </div>

                    <div class="change-item__item">
                        <label class="change-item__label" for="category_id">Категория</label>
                        <select class="change-item__create-select" aria-label="категория вещей"
                                data-class="change-item__category" name="category_id" id="category_id" required>
                            <option value="" selected>Выберите категорию</option>

                            @foreach ($categoriesList as $category)
                                <option value="{{ $category->id }}"
                                        @if (old('category_id')) @if (old('category_id')==$category->id) selected @endif @endif>
                                    {{ $category->title }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>
            </div>

            <div class="change-form__group change-item">
                <h4 class="change-item__heading change-product__sub-heading">Тип объявления</h4>
                <div class="change-item__type item-type">
                    <ul class="item-type__list">
                        <li class="item-type__item">

                            <label class="radio item-type__label item-type__label--radio" for="free">
                                <input class="item-type__radio-btn" type="radio" name="barter_type" id="free" value="free" checked>
                                <svg viewBox="0 0 24 24" filter="url(#goo-light)">
                                    <circle class="top" cx="12" cy="-12" r="8" />
                                    <circle class="dot" cx="12" cy="12" r="5" />
                                    <circle class="drop" cx="12" cy="12" r="2" />
                                </svg>

                                <span class="item-type__label-text">Отдам просто так</span>
                            </label>
                        </li>

                        <li class="item-type__item">
                            <label class="radio item-type__label item-type__label--radio" for="barter">
                                <input class="item-type__radio-btn" type="radio" name="barter_type" id="barter" value="barter">
                                <svg viewBox="0 0 24 24" filter="url(#goo-light)">
                                    <circle class="top" cx="12" cy="-12" r="8" />
                                    <circle class="dot" cx="12" cy="12" r="5" />
                                    <circle class="drop" cx="12" cy="12" r="2" />
                                </svg>

                                <span class="item-type__label-text">Обмен</span>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="change-item__item">
                        <label class="change-item__label" for="barter_title">Обменяю на</label>
                        <input class="change-item__input input" type="text" name="barter_title" id="barter_for" placeholder="Пример: Поменять на стол"
                            value="@if(old('barter_title')) {{old('barter_title')}}@endif">
                </div>
                <div class="change-item__item">
                        <label class="change-item__label" for="barter_text">Описание того, что Вы бы хотели</label>
                        <textarea class="change-item__input input input__textarea" name="barter_text" id="barter_text" rows="3">@if (old('barter_text')){{ old('barter_text') }}@endif</textarea>
                </div>
                <div class="change-item__item">
                        <label class="change-item__label" for="barter_category_id">Категория обменивамого</label>
                        <select class="change-item__create-select" aria-label="категория вещей"
                            data-class="change-item__category" name="barter_category_id" id="barter_category_id">
                            <option value="">Выберите категорию</option>
                            @foreach ($categoriesList as $category)
                                <option value="{{ $category->id }}" @if (old('barter_category_id')) @if (old('barter_category_id')==$category->id) selected @endif
                                @endif>{{$category->title}}</option>
                            @endforeach
                        </select>
                </div>
            </div>

            <div class="change-form__group change-item">
                <h3 class="change-item__heading change-product__sub-heading">Добавить фото</h3>

                <div class="change-item__list">

                    <div class="change-item__item">
                        <input class="change-item__input change-item__input--photo input--hidden" hidden type="file" name="image" id="image" multiple accept=".jpg, .png, .jepg, .gif">

                        <div class="change-item__load-file load-file">
                            <div class="load-file__wrapper">

                                <div class="load-file__previes">
                                    <div class="load-file__icon">
                                        <svg width="26" height="31" viewBox="0 0 26 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.1048 1.64262H7.12685C4.00685 1.63062 1.45085 4.11612 1.37585 7.23612V23.3416C1.30835 26.4946 3.81035 29.1046 6.96185 29.1721C7.01735 29.1721 7.07285 29.1736 7.12685 29.1721H19.1088C22.2438 29.0611 24.7218 26.4781 24.7038 23.3416V9.55662L17.1048 1.64262Z" stroke="#315DF7" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.7119 1.625V5.9885C16.7119 8.1185 18.4354 9.845 20.5654 9.851H24.6964" stroke="#315DF7" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12.4609 12.3633V21.4248" stroke="#315DF7" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M15.9798 15.8963L12.4623 12.3638L8.94482 15.8963" stroke="#315DF7" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>

                                    <label for="image" class="load-file__title">Нажмите чтобы загрузить файл</label>

                                    <p class="load-file__text">Формат файла PNG, JPEG, GIF. </p>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="change-item__item">
                        <label class="change-item__label" for="city_id">Город подачи</label>

                        <select class="change-item__create-select" name="city_id" id="city_id"
                                aria-label="Выберите города" data-class="change-item__city" required>
                            <option value="" selected>Выберите город</option>
                            @foreach ($citiesList as $city)

                                <option value="{{ $city->id }}"
                                        @if (old('city_id')) @if (old('city_id')==$city->id) selected @endif @endif>
                                    {{ $city->name }}
                                </option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <button class="change-form__btn btn btn-blue btn-reset" type="submit">Опубликовать объявление</button>
        </form>

        @include('user.productCart.previewCard')
    </div>

</section>

@endsection
