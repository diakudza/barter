<header class="header" id='header' aria-label="шапка">
    <div class="container header__container">

        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Поменяем или обменяем">
        </a>

        <nav class="header-admin__nav" id="navbars-example-default"  aria-label="Навигация">

            <div class="header-admin__list navbar-nav ms-auto navbar-nav-scroll">

                <button class="header-admin__bth">
                    <a class="nav-link" aria-current="page" href="{{ route('adIndex') }}">Объявления</a>
                </button>

                @if (Auth::user()->isAdmin() || Auth::user()->isDeveloper())
                    <button class="header-admin__bth">
                        <a class="nav-link" aria-current="page" href="{{ route('category.index') }}">Категории</a>
                    </button>
                    <!--a class="nav-link" aria-current="page" href="{{ route('comment.index') }}"><s>Комментарии</s></a-->
                @endif

                <button class="header-admin__bth">
                    <a class="nav-link" aria-current="page" href="{{ route('adminChat') }}">Заявки от пользователей</a>
                </button>

                @if (Auth::user()->isAdmin() || Auth::user()->isDeveloper())
                    <button class="header-admin__bth">
                       <a class="nav-link testClass" href="{{ route('user.index') }}">Пользователи</a>
                    </button>

                    <button class="header-admin__bth">
                       <a class="nav-link" href="{{ route('role.index') }}">Роли</a>
                    </button>

                    @if (Auth::user()->isDeveloper())
                        <button class="header-admin__bth">
                            <a class="nav-link" href="{{ route('admin.system') }}">Системный</a>
                        </button>
                    @endif
                @endif

                @if(auth()->user())
                    <button class="header-admin__bth">
                        <a class="nav-link" aria-current="page" href="{{ route('logout') }}">{{ auth()->user()->name }}</a>
                    </button>
                @endif
            </div>

            @if(auth()->guest())
                <span class="nav-item">
                    <a class="btn-outline-sm" href="{{ route('loginPage') }}">Выйти</a>
                </span>
            @endif
        </nav>

    </div>
</header>





