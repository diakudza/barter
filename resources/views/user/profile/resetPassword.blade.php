@extends('components.base')

@section('title', 'Личный кабинет - изменить пароль')

@section('content')

    <section class="container reset-password">
        <h3 class="heading reset-password__heading">Изменение пароля</h3>

        <form class="reset-password__form" action="{{ route('user.updateUserPassword') }}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <div class="reset-password__list change-item__list">

                <div class="reset-password__item change-item__item">
                    <label class="change-item__label" for="old-password">Старый пароль</label>
                    <input class="change-item__input input" type="password" id="old-password" name="oldPassword">
                </div>

                <div class="reset-password__item change-item__item">
                    <label class="change-item__label" for="new-password">Новый пароль</label>
                    <input class="change-item__input input" type="password" id="new-password" name="newPassword">
                </div>

                <div class="reset-password__item change-item__item">
                    <label class="change-item__label" for="confirm-new-password">Подтверждение пароля</label>
                    <input class="change-item__input input" type="password" id="confirm-new-password"
                           name="confirmNewPassword">
                </div>

            </div>

            <div class="reset-password__buttons">
                <button class="btn btn-reset btn-blue-nofill" type="submit">Сохранить изменения</button>
                <button class="btn btn-reset btn-del" type="reset">Отменить изменения</button>
            </div>

        </form>

    </section>

@endsection