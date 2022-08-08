@extends('components.admin_base')

@section('title',"Пользователь")

@section('content')

    <div class="container mt-5 pt-5">
    <p>Профиль пользователя: {{ $user->name }} </p>
    <p>Почта: {{ $user->email }} </p>
    <p>Дата регистрации: {{ $user->created_at }} </p>
    <p>Роль: {{ $user->getRole->role }} </p>
    <p>Обьявления: {{ $user->ads }} </p>
    <p>Комментарии: {{ $user->name }} </p>

    </div>


@endsection
