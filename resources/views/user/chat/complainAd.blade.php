@extends('components.base')

@section('title', 'Пожаловаться на объявление')

@section('content')

<section class="container get-support">
    <h3 class="heading get-support__heading">Пожаловаться на объявление</h3>

    @include('components.chats.complainForm', [
    'route' => route('storeAdComplain'),
    'inputName' => 'ad_id',
    'inputValue' => $id,
    ])

</section>

@endsection