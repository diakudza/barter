<header class="header" id='header' aria-label="шапка">
    <div class="container header__container">

        <a href="{{ route('home') }}" class="header__logo logo">
            <img src="{{ asset('images/logo.svg') }}" alt="Поменяем или обменяем">
        </a>

        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            {{ session('userCity') }}
        </button>

{{--        @include('components.city')--}}

        <div class="header__content">
            @include('components.headers.nav')
            @include('components.headers.userProfile')
        </div>

        <button class="btn btn-reset btn-toggel" aria-label="Открыть меню">
            <span class="line"></span>
            <span class="line"></span>
        </button>
    </div>
</header>
