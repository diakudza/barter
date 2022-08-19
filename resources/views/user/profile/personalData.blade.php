@extends('components.base')

@section('title', 'Личный кабинет - данные пользователя')

@section('content')

    <div class="container">
        <h3>Просмотр и редактирование личных данных</h3>
        <form action="{{ route('user.updateUserData') }}" method="post" class="w-50">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
            </div>
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="form-group">
                <label for="email">Электронная почта</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="phone" name="phone" id="phone" value="{{ $user->phone }}" class="form-control">
            </div>
            <div class="form-group">
                <img src="
                    @if($user->avatar))
                        {{ Storage::url($user->avatar->path) }}
                    @else
                        {{ Storage::url(images/clean.webp) }}
                    @endif
                " alt="image">
                <label for="image">Загрузить фото профиля</label>
                <input type="file" name="image" id="image">
            </div>
            <button type="submit" class="btn btn-success">Сохранить изменения</button>
            <button type="reset" class="btn btn-danger">Отменить изменения</button>
        </form>
        <a href="{{ route('user.profile.resetPassword') }}">Изменить пароль</a>
    </div>

@endsection
