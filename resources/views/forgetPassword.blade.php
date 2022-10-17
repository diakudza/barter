@extends('components.base')

@section('Восстановление пароля',"о нас")

@section('content')

    <section class="container">

        <div class="about-project">
            <h2 class="about-project__header"> Забыли пароль?</h2>
            <form action="{{route('password.email')}}" method="POST" class="form-label">
                @csrf

                <div class="row">
                    <input type="text" id="email" name="email" placeholder="Введите вашу почту"
                           class="form-control w-75">
                    <button type="submit" class="btn btn-success w-25">Отправить письмо</button>
                </div>
            </form>
        </div>

    </section>

@endsection
