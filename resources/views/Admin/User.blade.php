@extends('components.admin_base')

@section('title',"Пользователь")

@section('content')

<div class="container mt-5 pt-5">
    <div class="d-flex justify-content-between">

        <div>
            <p>Профиль пользователя: {{ $user->name }} </p>
            <p>Почта: {{ $user->email }} </p>
            <p>Дата регистрации: {{ $user->created_at }} </p>
            <p>Роль: {{ $user->getRole->role }} </p>
            <p>Обьявления: </p>
        </div>

        <div>
            <p>В избранном:</p>
            @foreach($user->favoriteAds as $favoritAd)
            <div>
                <a href="{{ route('adShow', $favoritAd->id) }}">{{$favoritAd->title}}</a>
            </div>
            @endforeach
        </div>
        <div>
            <p>На что откликнулся:</p>
            @foreach($user->wishes as $wishAd)
            <div>
                <a href="{{ route('adShow', $wishAd->id) }}">{{$wishAd->title}}</a>
            </div>
            @endforeach
        </div>


    </div>
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