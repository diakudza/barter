@extends('components.base')

@section('title', 'Пожаловаться на объявление')

@section('content')

    <div class="container">
        <h3>Пожаловаться на объявление</h3>

        @include('components.chats.complainForm', [
            'route' => route('storeAdComplain'),
            'inputName' => 'ad_id',
            'inputValue' => $id,
        ])
    </div>

@endsection
