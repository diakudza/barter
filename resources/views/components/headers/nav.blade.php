<nav class="nav-menu" aria-label="Навигация">

  <ul class="nav-menu__list">
    <li @if (Route::currentRouteNamed("home")) class="nav-menu__item active" @endif class="nav-menu__item">
      <a href="{{ route('home') }}" class="nav-menu__link">Главная</a>
    </li>

    <li @if (Route::currentRouteNamed("searchPage")) class="nav-menu__item active" @endif class="nav-menu__item">
      <a href="{{ route('searchPage') }}" class="nav-menu__link">Поиск</a>
    </li>


    <li @if (Route::currentRouteNamed("about")) class="nav-menu__item active" @endif class="nav-menu__item">
      <a href="{{ route('about') }}" class="nav-menu__link">О проекте</a>
    </li>

    @if(auth()->user() && in_array(auth()->user()->getRole() , ['admin', 'developer']))
    <li @if (Route::currentRouteNamed("adminmain")) class="nav-menu__item active" @endif class="nav-menu__item">
      <a href="{{ route('adminmain') }}" class="nav-menu__link">Админ панель</a>
    </li>
    @endif

  </ul>

</nav>
