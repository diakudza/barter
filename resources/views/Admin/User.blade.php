@extends('components.admin_base')

@section('title',"Пользователь")

@section('content')

    <div class="container mt-5 pt-5">
        <p>Профиль пользователя: {{ $user->name }} </p>
        <p>Почта: {{ $user->email }} </p>
        <p>Дата регистрации: {{ $user->created_at }} </p>
        <p>Роль: {{ $user->getRole->role }} </p>
        <p>Обьявления: </p>
        @foreach($user->ads as $ad)
            <div class="mt-2 border border-1">
                <p>номер: {{ $ad->id }} </p>
                <p>Заголовок: <a href=" {{ route('adShow', $ad->id) }}">{{ $ad->title }} </a></p>
                <p>Текст публикации: {{ $ad->text }} </p>

                <p>тип: {{ $ad->barter_type }} </p>
                <p>Дата публикации: {{ $ad->created_at }} </p>
            </div>
        @endforeach
        <p>Комментарии: {{ $user->name }}

    </div>


@endsection
