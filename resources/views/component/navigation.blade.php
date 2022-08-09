<!-- <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Навигация"> -->
<nav id="navbar" class="nav-menu" aria-label="Навигация">
  <div class="container nav-menu__container">

    <a href="{{ route('home') }}" class="nav-menu__logo logo">
      <img src="images/logo.svg" alt="Поменяем поменять">
    </a>

    <div class="nav-menu__content" id="nav-content">

      <ul class="nav-menu__list">
        <li class="nav-menu__item active">
          <a href="{{ route('home') }}" class="nav-menu__link">Главная</a>
        </li>
        <li class="nav-menu__item">
          <a href="{{ route('searchPage') }}" class="nav-menu__link">Каталог</a>
        </li>
        <li class="nav-menu__item">
          <a href="{{ route('home') }}" class="nav-menu__link">О проекте</a>
        </li>
      </ul>

      <div class="nav-menu__profile profile">

        <div class="profile__block">
          <div class="profile__list"></div>
        </div>

        <a class="nav-menu__btn btn btn-reset btn-blue" href="#">Выставить объявление</a>

        <!-- @if(auth()->user()) -->
        <!-- <a class="nav-link" aria-current="page" href="{{ route('logout') }}">{{ auth()->user()->name }}</a> -->

        <!-- @endif -->


        <!-- @if(auth()->guest())
        <a class="nav-menu__btn btn btn-white" href="{{ route('loginPage') }}">Войти</a>
        <a class="nav-menu__btn btn btn-reset btn-blue" href="#">Выставить объявление</a>
        @endif -->

      </div>

    </div>

    <button class="btn btn-reset btn-toggel">
      <span class="line"></span>
      <span class="line"></span>
    </button>

  </div>
</nav>