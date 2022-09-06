@extends('components.base')

@section('title', 'Обращение в службу поддержки')

@section('content')

    <div class="container">
        <h3>Обращение в службу поддержки</h3>
        @include('components.chats.complainForm', [
            'route' => route('storeSupportTicket'),
            'inputName' => '',
            'inputValue' => '',
        ])
    </div>

@endsection
