@extends('components.base')

@section('title', 'Пожаловаться на пользователя')

@section('content')

    <div class="container">
        <h3>Пожаловаться на пользователя</h3>
        @include('components.chats.complainForm', [
            'route' => '#',
            'inputName' => 'user_id',
            'inputValue' => $id,
        ])
    </div>

@endsection
