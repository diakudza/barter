@extends('components.base')

@section('title', 'Личный кабинет - данные пользователя')

@section('content')

    <div class="container">
        <h3>Просмотр и редактирование личных данных</h3>
        <form action="{{ route('user.updateUserData') }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" value="{{ Auth::user()->name }}">
            </div>
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="email">Электронная почта</label>
                <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">
            </div>
            <button type="submit">Сохранить изменения</button>
            <button type="reset">Отменить изменения</button>
        </form>
        <a href="{{ route('user.profile.resetPassword') }}">Изменить пароль</a>
    </div>

@endsection
