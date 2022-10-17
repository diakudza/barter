@extends('components.base')

@section('Восстановление пароля',"о нас")

@section('content')

    <section class="container">

        <div class="about-project">
            <h2 class="about-project__header"> Введите новый пароль</h2>
            <form action="{{route('password.update')}}" method="POST" class="form-label">
                @csrf

                <div class="row">
                    <input type="hidden" name="token" value="{{$token}}">
                    <input type="text" id="email" name="email" placeholder="Введите вашу почту"
                           class="form-control w-75">
                    <input type="password" id="email" name="password" placeholder="Пароль"
                           class="form-control w-75">
                    <input type="password" id="email" name="password_confirmation" placeholder="Подтверждение пароля"
                           class="form-control w-75">
                    <button type="submit" class="btn btn-success w-25">Восстановить</button>
                </div>
            </form>
        </div>

    </section>

@endsection
