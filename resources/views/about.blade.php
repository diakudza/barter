@extends('components.base')

@section('title',"о Нас")

@section('content')

<section class="container">

    <div class="about-project">
        <h2 class="about-project__header"> Привет! Мы - команда студентов GeekBrains</h2>
        <div class="about-project__description">
            <p> В рамках курсового проекта разрабатываем приложение для обмена ненужными вещами - Бартер</p>
            <p> Для чего нужен такой сервис обмена? Люди покупают все больше вещей. Но не все вещи оказываются нужными. Выкидывать их жалко, продавать можно, но не всегда выгодно. Поэтому многие возвращаются к традиционной системе обмена. Приложения для бартера в рамках одного города или страны становятся все более востребованными.</p>
        </div>
    </div>

    <div class="about-people">
        <div class="about-people__person">
                <p class="about-people__person-role"></p>
                <p class="about-people__person-biography"></p>
                <img class="about-people__photo" src="public/images/about-us/">
                <p class="about-people__person-name"> Михаил Дьяков - Product owner, backend разработчик</p>
            </div>
            <div class="about-people__person">
                <p> Артем Бирюков - frontend разработчик</p>
                <img class="about-people__photo" src="public/images/about-us/">
            </div>
            <div class="about-people__person">
                <p> Анна Егорова - frontend и backend разработчик</p>
                <img class="about-people__photo" src="public/images/about-us/">
            </div>
            <div class="about-people__person">
                <p> Никита Циунель - frontend разработчик</p>
                <img class="about-people__photo" src="public/images/about-us/">
            </div>
            <div class="about-people__person">
                <p> Кирилл Новичков - backend разработчик</p>
                <img class="about-people__photo" src="public/images/about-us/">
            </div>
    </div>


</section>

@endsection
