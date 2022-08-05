@extends('component.base')

@section('title',"Личный кабинет")

@section('content')

    <h3>Личный кабинет пользователя</h3>

    <ul>
        <li>
            <a href="{{route ('user.profile.addOffer')}}">Новое объявление</a>
        </li>
        <li>
            <a href="#">Мои обьявления</a>
        </li>
        <li>
            <a href="#">Личные данные</a>
        </li>
        <li></li>
        <li></li>
    </ul>

@endsection