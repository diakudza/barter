<nav class="nav-menu" aria-label="Навигация">

    <ul class="nav-menu__list">
        <li @if (Route::currentRouteNamed("home")) class="nav-menu__item active" @endif class="nav-menu__item">
            <a href="{{ route('home') }}" class="nav-menu__link" aria-label="Главная">Главная</a>
        </li>

        <li @if (Route::currentRouteNamed("searchPage")) class="nav-menu__item active" @endif class="nav-menu__item">
            <a href="{{ route('searchPage') }}" class="nav-menu__link" aria-label="Поиск">Поиск</a>
        </li>

        <li @if (Route::currentRouteNamed("about")) class="nav-menu__item active" @endif class="nav-menu__item">
            <a href="{{ route('about') }}" class="nav-menu__link" aria-label="О проекте">О проекте</a>
        </li>

    </ul>

</nav>
