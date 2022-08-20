@extends('components.admin_base')

@section('title',"Обьявления")

@section('content')

<div class="container mt-5 pt-5">
    <div class="d-flex">
        <div>
            <p>Автор: {{ $ad->user->name }} </p>
            <p>Дата публикации: {{ $ad->created_at }} </p>
            <p>Заголовок: {{ $ad->title }} </p>
            <p>Тип обьявления: {{ $ad->barter_type }} </p>
            <p>Текс обьявления: {{ $ad->text }} </p>
        </div>
        <div>
            <img src="{{ asset('storage/'.$ad->image) }}" height="400" alt="Картинка">
        </div>
    </div>
</div>

@endsection