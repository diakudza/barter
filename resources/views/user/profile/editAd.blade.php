@extends('components.base')

@section('title', 'Редактировать объявление')

@section('content')
    <div class="container">
        <h3>Страница редактирования объявления</h3>

        <form action="{{ route('ad.update', $ad->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Название</label>
                <!-- Здесь конструкци if endif  в одну строку, так как иначе в строку в форме добавляется куча пробелов -->
                <input type="text" id="title" name="title" placeholder="Название"
                    value="@if (old('title')) {{ old('title') }}@else{{ $ad->title }} @endif" required>
            </div>
            <div>
                <label for="text">Описание</label>
                <!-- Здесь конструкци if endif  в одну строку, так как иначе в строку в форме добавляется куча пробелов -->
                <textarea name="text" id="text" rows="20" required>
@if (old('text')){{ old('text') }}@else{{ $ad->text }}@endif
</textarea>
            </div>
            <div>
                <label for="image">Загрузить фото</label>
                <input type="file" name="image" id="image">
                <div class="container">
                    <div class="row">
                        @forelse ($ad->images as $image)
                            <div class="col-sm-6">
                                <img src="{{ Storage::url($image->path) }}" alt="image" height=400>
                                <div class="form-group">
                                    <label for="imageMain">Сделать главной</label>
                                    <input type="radio" name="imageMain" id="imageMain" value="{{ $image->id }}"
                                        @if ($image->image_type == 0) selected @endif>
                                    <label for="">Удалить</label>
                                    <input type="checkbox" name="removeImage[]" id="removeImage"
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
            </div>
            <div>

            </div>
            <div>
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id" required>
                    @foreach ($categoriesList as $category)
                        <option value="{{ $category->id }}"
                            @if (old('category_id')) @if (old('category_id') == $category->id) selected @endif
                            @endif
                            @if ($ad->category_id == $category->id) selected @endif>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div>
                <label for="free">Отдам просто так</label>
                <input type="radio" name="barter_type" id="free" value="free" checked>
                <!-- Функционал обмена реализуем позже -->
                <label for="barter">Обмен</label>
                <input type="radio" name="barter_type" id="barter" value="barter" disabled>
                <label for="barter_for">Обменяю на</label>
                <input type="text" name="barter_for" id="barter_for" disabled>
            </div>
            <div>
                <label for="city_id">Город подачи</label>
                <select name="city_id" id="city_id" required>
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
                <select name="status_id" id="status_id">
                    @foreach ($statusesList as $status)
                        <option value="{{ $status->id }}"
                            @if (old('status_id')) @if (old('status_id') == $status->id)
                                selected @endif
                            @endif
                            @if ($ad->status_id == $status->id) selected @endif>
                            {{ $status->description }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit">Сохранить</button>
                <button type="reset">Отменить изменения</button>
            </div>
        </form>
    </div>
@endsection
