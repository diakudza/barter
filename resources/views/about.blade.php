@extends('components.base')

@section('title',"о нас")

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
                <h5 class="about-people__person-name">Михаил Дьяков</h5>
                <div class="about-people__person-prephoto">
                    <img class="about-people__person-photo" src="{{ Storage::url('images/about-us/Mikhail.jpg') }}">
                </div>
                <p class="about-people__person-role">Роль в проекте: Product owner, backend разработчик</p>
                <p class="about-people__person-skills">Ключевые навыки: HTML, SCSS, JS, pug, PHP, MySql, Bash, Docker, Git, Laravel, Blade, Inertia.JS</p>
            </div>
            <div class="about-people__person">
                <h5 class="about-people__person-name"> Артем Бирюков</h5>
                <div class="about-people__person-prephoto">
                    <img class="about-people__person-photo" src="{{ Storage::url('images/about-us/Artem.jpg') }}">
                </div>
                <p class="about-people__person-role">Роль в проекте: frontend разработчик</p>
                <p class="about-people__person-skills">Ключевые навыки: HTML, pug, SCSS, gsap, JS, React, Git, PHP, SQL ,gulp</p>
            </div>
            <div class="about-people__person">
                <h5 class="about-people__person-name"> Анна Егорова</h5>
                <div class="about-people__person-prephoto">
                    <img class="about-people__person-photo" src="{{ Storage::url('images/about-us/Anna.jpg') }}">
                </div>
                <p class="about-people__person-role">Роль в проекте: frontend разработчик</p>
                <p class="about-people__person-skills">Ключевые навыки: HTML,CSS, Postgres, PHP, JS, Linux</p>
            </div>
            <div class="about-people__person">
                <h5 class="about-people__person-name"> Никита Циунель</h5>
                <div class="about-people__person-prephoto">
                    <img class="about-people__person-photo" src="{{ Storage::url('images/about-us/Nikita.jpg') }}">
                </div>
                <p class="about-people__person-role">Роль в проекте: frontend разработчик</p>
                <p class="about-people__person-skills">Ключевые навыки: HTML5, CSS, JS(ReactJs), PHP(Laravel)</p>
            </div>
            <div class="about-people__person">
                <h5 class="about-people__person-name"> Кирилл Новичков</h5>
                <div class="about-people__person-prephoto">
                    <img class="about-people__person-photo" src="{{ Storage::url('images/about-us/Kirill.jpg') }}">
                </div>
                <p class="about-people__person-role">Роль в проекте: backend разработчик</p>
                <p class="about-people__person-skills">Ключевые навыки: PHP, Laravel, MySql, Postgresql, Linux, Docker, Git, bash</p>
            </div>
    </div>


</section>

@endsection
