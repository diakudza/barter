@extends('components.base')

@section('title',"Личный кабинет")

@section('content')
    <div class="container">
        <h3>Личный кабинет пользователя</h3>

        <ul>
            <li>
                <a href="{{route ('user.profile.createAd')}}">Новое объявление</a>
            </li>
            <li>
                <a href="{{route ('user.profile.listAds')}}">Мои обьявления</a>
            </li>
            <li>
                <a href="{{ route('user.profile.personalData') }}">Личные данные</a>
            </li>
            <li></li>
            <li></li>
        </ul>
    </div>

@endsection
