@extends('components.base')

@section('title', 'Редактировать объявление')

@section('content')

    <section class="container change-product">

        <h2 class="change-product__heading heading">Страница редактирования объявления</h2>
        <div class="line"></div>

        <div class="change-product__wrapper">

            <form action="{{ route('ad.update', $ad->id) }}" class="change-product__form change-form" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('put')

                @if($fromAdmin)
                    <input type="hidden" name="fromAdmin" value="1">
                @endif

                <div class="change-form__list">
                    <div class="change-form__group change-item">
                        <h3 class="change-item__heading change-product__sub-heading">Основная информация</h3>

                        <div class="change-item__list">
                            <div class="change-item__item">
                                <label class="change-item__label" for="title">Название</label>
                                <input class="change-item__input input" type="text" id="title" name="title"
                                       placeholder="Название товара"
                                       value="@if (old('title')) {{ old('title') }}@else{{ $ad->title }} @endif"
                                       required>
                            </div>

                            <div class="change-item__item">
                                <label class="change-item__label" for="text">Описание</label>
                                <textarea class="change-item__input input input__textarea" name="text" id="text"
                                          rows="3"
                                          placeholder="Напишите полное описание товара" required>@if (old('text'))
                                        {{ old('text') }}
                                    @else
                                        {{ $ad->text }}
                                    @endif</textarea>
                            </div>

                            <div class="change-item__item">
                                <label class="change-item__label" for="category_id">Категория</label>
                                <select class="change-item__create-select" aria-label="категория вещей"
                                        data-class="change-item__category" name="category_id" id="category_id" required>
                                    <option value="">Выберите категорию</option>

                                    @foreach ($categoriesList as $category)
                                        <option value="{{ $category->id }}"
                                                @if (old('category_id')) @if (old('category_id')==$category->id) selected
                                                @endif
                                                @endif
                                                @if ($ad->category_id == $category->id) selected @endif>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="change-item__item">
                                <label class="change-item__label" for="city_id">Город подачи</label>

                                <select class="change-item__create-select" name="city_id" id="city_id"
                                        aria-label="Выберите города" data-class="change-item__city" required>
                                    <option value="">Выберите город</option>

                                    @foreach ($citiesList as $city)
                                        <option value="{{ $city->id }}"
                                                @if (old('city_id')) @if (old('city_id')==$city->id) selected @endif
                                                @endif
                                                @if ($ad->city_id == $city->id) selected @endif>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="change-item__item">
                                <label class="change-item__label" for="status_id">Статус</label>
                                <select class="change-item__create-select" name="status_id" id="status_id"
                                        aria-label="Выбор статуса" data-class="change-item__status">

                                    @foreach ($statusesList as $status)
                                        <option value="{{ $status->id }}" @if (old('status_id')) @if (old('status_id')
                                ==$status->id) selected @endif
                                        @endif
                                        @if ($ad->status_id == $status->id) selected @endif>
                                            {{ $status->description }}
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
                                        <input class="item-type__radio-btn" type="radio" name="barter_type" id="free"
                                               value="free"
                                               @if(old('barter_type') && old('barter_type') == 'free')) checked
                                               @elseif ($ad->barter_type == 'free') checked @endif>
                                        <svg viewBox="0 0 24 24" filter="url(#goo-light)">
                                            <circle class="top" cx="12" cy="-12" r="8"/>
                                            <circle class="dot" cx="12" cy="12" r="5"/>
                                            <circle class="drop" cx="12" cy="12" r="2"/>
                                        </svg>

                                        <span class="item-type__label-text">Отдам просто так</span>
                                    </label>
                                </li>

                                <li class="item-type__item">
                                    <label class="radio item-type__label item-type__label--radio" for="barter">
                                        <input class="item-type__radio-btn" type="radio" name="barter_type" id="barter"
                                               value="barter"
                                               @if (old('barter_type') && old('barter_type') == 'barter')) checked
                                               @elseif ($ad->barter_type == 'barter') checked @endif>
                                        <svg viewBox="0 0 24 24" filter="url(#goo-light)">
                                            <circle class="top" cx="12" cy="-12" r="8"/>
                                            <circle class="dot" cx="12" cy="12" r="5"/>
                                            <circle class="drop" cx="12" cy="12" r="2"/>
                                        </svg>

                                        <span class="item-type__label-text">Обмен</span>
                                    </label>
                                </li>
                            </ul>
                        </div>

                        <div class="change-item__item item-type">
                            <label class="change-item__label" for="barter_title">Обменяю на</label>
                            <input class="change-item__input input" type="text" name="barter_title" id="barter_for"
                                   placeholder="Пример: Поменять на стол"
                                   value="@if(old('barter_title')) {{old('barter_title')}} @else {{$ad->barter_title}} @endif">
                        </div>

                        <div class="change-item__item item-type">
                            <label class="change-item__label" for="barter_text">Описание того, что Вы бы хотели</label>
                            <textarea class="change-item__input input input__textarea" name="barter_text"
                                      id="barter_text" rows="3" placeholder="Напишите описание товара для обмена">
                                @if (old('barter_text'))
                                    {{ old('barter_text') }}
                                @else
                                    {{ $ad->barter_text }}
                                @endif
                            </textarea>
                        </div>

                        <div class="change-item__item item-type">
                            <label class="change-item__label" for="barter_category_id">Категория обмениваемого</label>
                            <select class="change-item__create-select" aria-label="категория вещей"
                                    data-class="change-item__category" name="barter_category_id"
                                    id="barter_category_id">
                                <option value="">Выберите категорию</option>

                                @foreach ($categoriesList as $category)
                                    <option value="{{ $category->id }}"
                                            @if (old('barter_category_id')) @if (old('barter_category_id')==$category->id) selected
                                            @endif
                                            @endif
                                            @if ($ad->barter_category_id == $category->id) selected @endif>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="change-form__group change-item">
                        <h3 class="change-item__heading change-product__sub-heading">Добавить фото</h3>

                        <div class="change-item__item">
                            <input class="change-item__input change-item__input--photo input--hidden" hidden type="file"
                                   name="image" id="image" multiple accept=".jpg, .png, .jepg, .gif">

                            <div class="change-item__load-file load-file">
                                <div class="load-file__wrapper">

                                    <div class="load-file__previes">
                                        <div class="load-file__icon">
                                            <svg width="26" height="31" viewBox="0 0 26 31" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M17.1048 1.64262H7.12685C4.00685 1.63062 1.45085 4.11612 1.37585 7.23612V23.3416C1.30835 26.4946 3.81035 29.1046 6.96185 29.1721C7.01735 29.1721 7.07285 29.1736 7.12685 29.1721H19.1088C22.2438 29.0611 24.7218 26.4781 24.7038 23.3416V9.55662L17.1048 1.64262Z"
                                                      stroke="#315DF7" stroke-width="2.25" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path d="M16.7119 1.625V5.9885C16.7119 8.1185 18.4354 9.845 20.5654 9.851H24.6964"
                                                      stroke="#315DF7" stroke-width="2.25" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path d="M12.4609 12.3633V21.4248" stroke="#315DF7" stroke-width="2.25"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M15.9798 15.8963L12.4623 12.3638L8.94482 15.8963"
                                                      stroke="#315DF7" stroke-width="2.25" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                            </svg>
                                        </div>

                                        <label for="image" class="load-file__title">Нажмите чтобы загрузить файл</label>

                                        <p class="load-file__text">Формат файла PNG, JPEG, GIF. </p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    {{--                <div class="change-form__group">--}}
                    {{--                    <div class="row mt-5">--}}
                    {{--                        @forelse ($ad->images as $image)--}}
                    {{--                            <div class="col-sm-4">--}}
                    {{--                                <img src="{{ Storage::url($image->path) }}" alt="image" height=400>--}}
                    {{--                                <div class="form-group d-flex justify-content-sm-evenly">--}}
                    {{--                                    <label for="imageMain">Сделать главной</label>--}}

                    {{--                                    <input type="radio" name="imageMain" id="imageMain" value="{{ $image->id }}" class="form-check" @if ($image->image_type == 'ad_main') checked @endif>--}}

                    {{--                                    <label for="">Удалить</label>--}}
                    {{--                                    <input type="checkbox" name="removeImage[]" id="removeImage" class="form-check" value="{{ $image->id }}">--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                        @empty--}}
                    {{--                            <div class="col-sm-6">--}}
                    {{--                                <img src="{{ Storage::url('images/clean.webp') }}" alt="image" height=400>--}}
                    {{--                            </div>--}}
                    {{--                        @endforelse--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                </div>

                <div class="change-form__buttons">
                    <button type="submit" class="btn btn-blue btn-reset change-form__btn" title="Изменить объявление">
                        Изменить
                    </button>
                    <button type="reset" class="btn btn-reset btn-black change-form__btn" title="Отменить изменения">
                        Отменить изменения
                    </button>
                </div>
            </form>


            <div class="change-product__preview preview-card">
                <h3 class="preview-card__heading change-product__sub-heading">Превью</h3>

                <div class="preview-card__wrapper">
                    <div class="preview-card__img">

                        <div class="preview-card__status-list">
                            @foreach ($statusesList as $status)
                                @if($status->id == $ad->status_id)
                                    <div class="preview-card__status">
                                        <span>{{ $status->description }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        @forelse ($ad->images as $image)
                            <img src="{{ Storage::url($image->path) }}" alt="{{ $ad->title }}" title="{{ $ad->title }}">
                        @empty
                            <img src="{{ asset('images/product/placeholder400x400.png' )}}" alt="{{ $ad->title }}"
                                 title="{{ $ad->title }}">
                        @endforelse
                    </div>

                    <div class="preview-card__body">
                        <div class="preview-card__top">
                            <h4 class="preview-card__title">{{ $ad->title }}</h4>

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

                                <p class="preview-card__location-text">{{ $city->name }}</p>
                            </div>

                            @if ($ad->barter_type == 'barter')
                                <div>
                                    <p>Обмен на: {{ $ad->barter_title }}</p>
                                </div>
                            @endif

                        </div>

                        <div class="preview-card__bottom">
                            <div class="preview-card__author">
                                <div class="preview-card__author-img">
                                    <img class="author-img" src="
                                    @if(auth()->user()->avatar()->first())
                                        {{ Storage::url(auth()->user()->avatar()->first()->path) }}
                                    @else
                                        {{ asset('images/icon-avatar.png') }}
                                    @endif
                                    "
                                         alt="{{ Auth::user()->name }}"
                                         title="{{ Auth::user()->name }}">
                                </div>

                                <p class="preview-card__author-name">{{ Auth::user()->name }}</p>
                            </div>

                            <div class="preview-card__add">
                                <p class="preview-card__add-text">Опубликовано:</p>
                                <p class="preview-card__add-time">{{ $ad->getCreatedDate() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="change-form__del" action="{{ route('ad.destroy', $ad->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-reset btn-del change-form__btn" title="Удалить объявление">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.1042 6.39062C14.1042 6.39062 13.6517 12.0031 13.3892 14.3673C13.2642 15.4965 12.5667 16.1581 11.4242 16.179C9.24999 16.2181 7.07332 16.2206 4.89999 16.1748C3.80082 16.1523 3.11499 15.4823 2.99249 14.3731C2.72832 11.9881 2.27832 6.39062 2.27832 6.39062"
                                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.2567 3.69987H1.125" stroke-width="1.5" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <path d="M12.5335 3.69998C11.8793 3.69998 11.316 3.23748 11.1877 2.59665L10.9852 1.58331C10.8602 1.11581 10.4368 0.79248 9.95432 0.79248H6.42682C5.94432 0.79248 5.52099 1.11581 5.39599 1.58331L5.19349 2.59665C5.06516 3.23748 4.50182 3.69998 3.84766 3.69998"
                                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    </section>

@endsection
