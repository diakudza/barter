@extends('components.base')

@section('title', 'Личный кабинет - пароль')

@section('content')

    <div class="container">
        <h3>Изменение пароля</h3>
        <form action="{{ route('user.updateUserPassword') }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="oldPassword">Старый пароль</label>
                <input type="password" name="oldPassword" id="oldPassword">
            </div>
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="NewPassword">Новый пароль</label>
                <input type="password" name="newPassword" id="newPassword">
            </div>
            <div class="form-group">
                <label for="confirmNewPassword">Подтверждение пароля</label>
                <input type="password" name="confirmNewPassword" id="confirmNewPassword">
            </div>
            <button type="submit">Сохранить изменения</button>
            <button type="reset">Отменить изменения</button>
        </form>
    </div>

@endsection
