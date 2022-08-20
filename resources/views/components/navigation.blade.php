<nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Навигация">
    <div class="container">
        <a href="{{ route('home') }}" class="logo">
            <img src="images/logo.svg" alt="Бартер">
        </a>
        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ms-auto navbar-nav-scroll">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('searchPage') }}">Поиск</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">О нас</a>
                </li>

                @if(auth()->user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">Личный кабинет</a></li>

                        @if (auth()->user() && auth()->user()->isUserHasAdminAccess())
                        <li>
                            <a class="dropdown-item" href="{{route('adminmain')}}">Панель упраления сайтом</a>
                        </li>
                        @endif

                        <li><a class="dropdown-item" href="{{ route('logout') }}">Выйти</a></li>
                    </ul>
                </li>
            </ul>
            @endif
            @if(auth()->guest())
            <span class="nav-item">
                <a class="btn-outline-sm" href="{{ route('loginPage') }}">login</a>
            </span>
            @endif
        </div>

    </div>
</nav>