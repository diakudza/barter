<nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Навигация">
    <div class="container nav">
        <a href="{{ route('home') }}" class="logo"><img src="images/logo.svg" alt="Бартер"></a>
        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ms-auto navbar-nav-scroll">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('adIndex') }}">Объявления</a>
                    <a class="nav-link" aria-current="page" href="{{ route('category.index') }}">Категории</a>
                    <a class="nav-link" aria-current="page" href="{{ route('comment.index') }}"><s>Комментарии</s></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">Пользователи</a>
                    <a class="nav-link" href="{{ route('role.index') }}">Роли</a>
                    <a class="nav-link" href="{{ route('admin.system') }}">Системный</a>
                </li>
                @if(auth()->user())
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('logout') }}">{{ auth()->user()->name }}</a>
                </li>
                @endif
            </ul>
            @if(auth()->guest())
            <span class="nav-item">
                <a class="btn-outline-sm" href="{{ route('loginPage') }}">login</a>
            </span>
            @endif
        </div>
    </div>
</nav>
