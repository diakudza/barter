@extends('components.base')

@section('title', 'Пожаловаться на пользователя')

@section('content')

<section class="container get-support">
    <h3 class="heading get-support__heading">Пожаловаться на пользователя</h3>

    @include('components.chats.complainForm', [
     'route' => route('storeUserComplain'),
     'inputName' => 'user_id',
     'inputValue' => $id,
     ])

</section>

@endsection