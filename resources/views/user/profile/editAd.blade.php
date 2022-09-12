@extends('components.base')

@section('title', 'Редактировать объявление')

@section('content')

<div class="container">
    <h3>Страница редактирования объявления</h3>
    <form action="{{ route('ad.update', $ad->id) }}" method="post" enctype="multipart/form-data" class="form-1">
        @csrf
        @method('put')
        @if($fromAdmin)
            <input type="hidden" name="fromAdmin" value="1">
        @endif
        <div class="row">
            <div class="w-50">
                <div class="form-group">
                    <label for="title">Название</label>
                    <!-- Здесь конструкци if endif  в одну строку, так как иначе в строку в форме добавляется куча пробелов -->
                    <input type="text" id="title" name="title" placeholder="Название" class="form-control" value="@if (old('title')) {{ old('title') }}@else{{ $ad->title }} @endif" required>
                </div>

                <div>
                    <label for="text">Описание</label>
                    <!-- Здесь конструкци if endif  в одну строку, так как иначе в строку в форме добавляется куча пробелов -->
                    <textarea name="text" id="text" rows="5" required class="form-control">@if (old('text')){{ old('text') }}@else{{ $ad->text }}@endif</textarea>
                </div>

                <label for="image">Загрузить фото</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="w-50">
                <div>
                    <label for="category_id">Категория</label>
                    <select name="category_id" id="category_id" required class="form-select ">
                        @foreach ($categoriesList as $category)
                        <option value="{{ $category->id }}" @if (old('category_id')) @if (old('category_id')==$category->id) selected @endif
                            @endif
                            @if ($ad->category_id == $category->id) selected @endif>
                            {{ $category->title }}
                        </option>
                        @endforeach
                    </select>
                </div>
                    <div class="d-flex flex-column">
                        <label for="free">Отдам просто так</label>
                        <input type="radio" name="barter_type" id="free" value="free"
                            @if ($ad->barter_type == 'free') checked @endif>
                        <label for="barter">Обмен</label>
                        <input type="radio" name="barter_type" id="barter" value="barter"
                            @if ($ad->barter_type == 'barter') checked @endif>
                        <label for="barter_for">Обменяю на</label>
                        <input type="text" name="barter_title" id="barter_title" class="form-control"
                            value="@if (old('barter_title')) {{ old('barter_title') }}@else{{ $ad->barter_title }} @endif">
                        <div class="change-item__item">
                            <label class="change-item__label" for="barter_text">Описание того, что Вы бы хотели</label>
                            <textarea class="change-item__input input input__textarea" name="barter_text" id="barter_text" rows="3">
@if (old('barter_text')){{ old('barter_text') }}@else{{ $ad->barter_text }}@endif
</textarea>
                        </div>
                        <div class="change-item__item">
                            <label class="change-item__label" for="barter_category_id">Категория обменивамого</label>
                            <select class="change-item__create-select" aria-label="категория вещей"
                                data-class="change-item__category" name="barter_category_id" id="barter_category_id">
                                <option value="" selected>Выберите категорию</option>

                                @foreach ($categoriesList as $category)
                                    <option value="{{ $category->id }}"
                                        @if (old('barter_category_id')) @if (old('barter_category_id') == $category->id) selected @endif
                                        @endif
                                        @if ($ad->barter_category_id == $category->id) selected @endif>
                                        {{ $category->title }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="city_id">Город подачи</label>
                        <select name="city_id" id="city_id" required class="form-select">
                            @foreach ($citiesList as $city)
                                <option value="{{ $city->id }}"
                                    @if (old('city_id')) @if (old('city_id') == $city->id) selected @endif
                                    @endif
                                    @if ($ad->city_id == $city->id) selected @endif>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                <div>
                    <label for="status_id">Статус</label>
                    <select name="status_id" id="status_id" class="form-select">
                        @foreach ($statusesList as $status)
                        <option value="{{ $status->id }}" @if (old('status_id')) @if (old('status_id')==$status->id)
                            selected @endif
                            @endif
                            @if ($ad->status_id == $status->id) selected @endif>
                            {{ $status->description }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            </div>

            <div class="container">
                <div class="row mt-5">
                    @forelse ($ad->images as $image)
                        <div class="col-sm-4">
                            <img src="{{ Storage::url($image->path) }}" alt="image" height=400>
                            <div class="form-group d-flex justify-content-sm-evenly">
                                <label for="imageMain">Сделать главной</label>
                                <input type="radio" name="imageMain" id="imageMain" value="{{ $image->id }}"
                                    class="form-check" @if ($image->image_type == 'ad_main') checked @endif>
                                <label for="">Удалить</label>
                                <input type="checkbox" name="removeImage[]" id="removeImage" class="form-check"
                                    value="{{ $image->id }}">
                            </div>
                        </div>
                    @empty
                        <div class="col-sm-6">
                            <img src="{{ Storage::url('images/clean.webp') }}" alt="image" height=400>
                        </div>
                    @endforelse
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-success">Сохранить</button>
                <button type="reset" class="btn btn-danger">Отменить изменения</button>
            </div>

        </form>

        <form action="{{ route('ad.destroy', $ad->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Удалить объявление</button>
        </form>
    </div>

@endsection
