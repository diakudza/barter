@extends('components.base')

@section('title', 'Добавить объявление')

@section('content')

    <section class="container change-product">

        <h2 class="change-product__heading heading">Добавить новое объявление</h2>
        <div class="line"></div>
{{--{{dd() }}--}}

{{--        @if($ad->user->avatar()->first())--}}
{{--            src="{{Storage::url($user->avatar()->first()->path)}}"--}}
{{--        @else--}}
        <div class="change-product__wrapper">

{{--            <img src="{{Storage::url($user->avatar()->first()->path)}}" alt="">--}}

            <form action="{{ route('ad.store') }}" class="change-product__form change-form" method="post"
                  enctype="multipart/form-data"> @csrf
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
                    <h4 class="change-item__heading change-product__sub-heading">Тип объявление</h4>

                    <div class="change-item__type item-type__list">
                        <div class="item-type__item">
                            <label class="item-type__label" for="free">Отдам просто так</label>
                            <input class="item-type__radio-btn" type="radio" name="barter_type" id="free"
                                   value="free" checked>
                        </div>

                        <!-- Функционал обмена реализуем позже -->
                        <div class="item-type__item">
                            <label class="item-type__label" for="barter">Обмен</label>
                            <input class="item-type__radio-btn" type="radio" name="barter_type" id="barter"
                                   value="barter">
                        </div>

                        <div class="item-type__item">
                            <label class="change-item__label" for="barter_for">Обменяю на</label>
                            <input class="change-item__input input" type="text" name="barter_for"
                                   id="barter_for" placeholder="Пример: Поменять на стол">
                        </div>
                    </div>
                </div>

                <div class="change-form__group change-item">
                    <h3 class="change-item__heading change-product__sub-heading">Добавить фото</h3>

                    <div class="change-item__list">

                        <div class="change-item__item">
                            <label class="change-item__label" for="image">Загрузить фото</label>
                            <input class="change-item__input change-item__input--photo" type="file" name="image"
                                   id="image">
                        </div>

                        <div class="change-item__item">
                            <label class="change-item__label" for="city_id">Город подачи</label>

                            <select class="change-item__create-select" name="city_id" id="city_id"
                                    aria-label="Выберите города" data-class="search__category" required>

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

            <div class="change-product__preview preview-card">
                <h3 class="preview-card__heading change-product__sub-heading">Превью</h3>

                <div class="preview-card__wrapper">
                    <div class="preview-card__img">
                        <img src="{{ asset('images/product/placeholder400x400.png' )}}" alt="Название товара"
                             title="Название товара">
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

                                <p class="preview-card__location-text">Москва</p>
                            </div>
                        </div>

                        <div class="preview-card__bottom">
                            <div class="preview-card__author">
                                <div class="preview-card__author-img">
{{--                                    Добавить если нет фото аватарки--}}
                                    <img class="author-img" src="{{ Storage::url(auth()->user()->avatar()->first()->path) }}" alt="{{ Auth::user()->name }}" title="{{ Auth::user()->name }}">
                                </div>

                                <p class="preview-card__author-name">{{ Auth::user()->name }}</p>
                            </div>

                            <div class="preview-card__add">
                                <p class="preview-card__add-text">Опубликовано:</p>
                                <p class="preview-card__add-time">{{ date("m/d/Y")  }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
