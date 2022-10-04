@extends('components.base')

@section('title', 'Обращение в службу поддержки')

@section('content')

<section class="container get-support">
    <h3 class="heading get-support__heading">Обращение в&nbsp;службу поддержки</h3>

    @include('components.chats.complainForm', [
    'route' => route('storeSupportTicket'),
    'inputName' => '',
    'inputValue' => '',
    ])

</section>

@endsection