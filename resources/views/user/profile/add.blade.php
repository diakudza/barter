@extends('component.base')

@section('title',"Добавить объявление")

@section('content')

    <h3>Страница добавления объявления</h3>

    <form action="{{ route('ad.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text"id="title" name="title" placeholder="Название"
                    value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="content">Описание</label>
            <textarea name="text" id="text" rows="20" required>{{ old('text') }}</textarea>
        </div>
        <div>
            <label for="image">Загрузить фото</label>
            <input type="file" name="image" id="image">
        </div>
        <div>

        </div>
        <div>
            <label for="categories">Категория</label>
            <select name="categories" id="categories" class="form-select" required>
                @foreach ($categoriesList as $category)
                    <option value="{{ $category->id }}"
                        @if (old('categories')) 
                            @if (old('categories') == $city->id) selected 
                            @endif
                        @endif>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
            <label for="free">Отдам просто так</label>
            <input type="radio" name="barter_type" id="free" value="free" checked>      
            <!-- Функционал обмена реализуем позже -->
            <label for="barter">Обмен</label>
            <input type="radio" name="barter_type" id="barter" value="barter" disabled>
            <label for="barter_for">Обменяю на</label>
            <input type="text" name="barter_for" id="barter_for" disabled>
        <div>
            <label for="cities">Город подачи</label>
            <select name="cities" id="cities" class="form-select" required>
                @foreach ($citiesList as $city)
                    <option value="{{ $city->id }}"
                        @if (old('cities')) 
                            @if (old('cities') == $city->id) selected 
                            @endif
                        @endif>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Сохранить</button>
        </div>
    </form>

@endsection