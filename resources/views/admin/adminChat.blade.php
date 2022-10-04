@extends('components.admin_base')

@section('title', 'Чаты с пользователями')

@section('content')
    @include('user.chat.chats')
@endsection