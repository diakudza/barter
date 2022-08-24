@extends('components.base')

@section('title', 'Добавить объявление')

@section('content')
<div class="container">
    <h3>Страница добавления объявления</h3>
    <form action="{{ route('ad.store') }}" method="post" enctype="multipart/form-data" class="w-50">
        @csrf
        <div class="form-group">
            <label class="form-label" for="title">Название</label>
            <input class="form-control" type="text" id="title" name="title" placeholder="Название" value="{{ old('title') }}" required>
        </div>
        <div>
            <label class="form-label" for="text">Описание</label>
            <textarea class="form-control" name="text" id="text" rows="3" required>{{ old('text') }}</textarea>
        </div>
        <div>
            <label class="form-label" for="image">Загрузить фото</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>

        <div>
            <label class="form-label" for="category_id">Категория</label>
            <select class="form-select" name="category_id" id="category_id" required>
                @foreach ($categoriesList as $category)
                <option value="{{ $category->id }}" @if (old('category_id')) @if (old('category_id')==$category->id) selected @endif @endif>
                    {{ $category->title }}
                </option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div>
            <label class="form-label" for="free">Отдам просто так</label>
            <input class="form-check" type="radio" name="barter_type" id="free" value="free" checked>
            <!-- Функционал обмена реализуем позже -->
            <label class="form-label" for="barter">Обмен</label>
            <input class="form-check" type="radio" name="barter_type" id="barter" value="barter" disabled>
            <label class="form-label" for="barter_for">Обменяю на</label>
            <input class="form-control" type="text" name="barter_for" id="barter_for" disabled>
        </div>
        <div>
            <label class="form-label" for="city_id">Город подачи</label>
            <select class="form-select" name="city_id" id="city_id" required>
                @foreach ($citiesList as $city)
                <option value="{{ $city->id }}" @if (old('city_id')) @if (old('city_id')==$city->id) selected @endif @endif>
                    {{ $city->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </div>
    </form>
</div>

@endsection
