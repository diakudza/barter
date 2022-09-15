<header class="header" id='header' aria-label="шапка">
    <div class="container header__container">

        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Поменяем или обменяем">
        </a>

        <nav class="header-admin__nav" id="navbars-example-default"  aria-label="Навигация">
            <ul class="header-admin__list navbar-nav ms-auto navbar-nav-scroll">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('adIndex') }}">Объявления</a>
                    @if (Auth::user()->isAdmin() || Auth::user()->isDeveloper())
                        <a class="nav-link" aria-current="page" href="{{ route('category.index') }}">Категории</a>
                        <a class="nav-link" aria-current="page" href="{{ route('comment.index') }}"><s>Комментарии</s></a>
                    @endif
                    <a class="nav-link" aria-current="page" href="{{ route('adminChat') }}">Заявки от пользователей</a>
                </li>
                <li class="nav-item">
                    @if (Auth::user()->isAdmin() || Auth::user()->isDeveloper())
                        <a class="nav-link testClass" href="{{ route('user.index') }}">Пользователи</a>
                        <a class="nav-link" href="{{ route('role.index') }}">Роли</a>
                        @if (Auth::user()->isDeveloper())
                            <a class="nav-link" href="{{ route('admin.system') }}">Системный</a>
                        @endif
                    @endif
                </li>
                @if(auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('logout') }}">{{ auth()->user()->name }}</a>
                    </li>
                @endif
            </ul>

            @if(auth()->guest())
                <span class="nav-item">
                    <a class="btn-outline-sm" href="{{ route('loginPage') }}">Выйти</a>
                </span>
            @endif
        </nav>

    </div>
</header>





