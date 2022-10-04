<div class="header__profile top-profile">
    <div class="top-profile__content">

        @if(auth()->user())

        @include('components.headers.actions')

        <div class="top-profile__avatar">
            <img @if (auth()->user() && auth()->user()->avatar()->first())
            src="{{ Storage::url(auth()->user()->avatar()->first()->path) }}"
            @else src="{{ asset('images/icon-avatar.png') }}"
            @endif alt="{{ auth()->user()->name }}" class="top-profile__img">
        </div>
        @endif

        @if(auth()->guest())
        <a class="nav-menu__btn btn btn-white" href="{{ route('loginPage') }}">Войти</a>
        @endif
    </div>

    @if(auth()->user())
    <a class="nav-menu__btn btn btn-blue" href="{{route('user.profile.createAd')}}">Выставить объявление</a>

    <div class="top-profile__menu profile-menu">

        @include('components.headers.profileMenu')

    </div>

    @endif
</div>