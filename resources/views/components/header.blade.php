<header class="header" id='header'>
    <div class="container header__container">

        <a href="{{ route('home') }}" class="header__logo logo">
            <img src="{{ asset('images/logo.svg' )}}" alt="Поменяем или обменяем">
        </a>

        <div class="header__content">
            <nav class="nav-menu" aria-label="Навигация">

                <ul class="nav-menu__list">
                    <li class="nav-menu__item active">
                        <a href="{{ route('home') }}" class="nav-menu__link">Главная</a>
                    </li>

                    <li class="nav-menu__item">
                        <a href="{{ route('searchPage') }}" class="nav-menu__link">Поиск</a>
                    </li>

                    <li class="nav-menu__item">
                        <a href="/about" class="nav-menu__link">О проекте</a>
                    </li>

                    @if(auth()->user() && in_array(auth()->user()->getRole->role , ['admin', 'developer']))
                    <li class="nav-menu__item">
                        <a href="{{route('adminmain')}}" class="nav-menu__link">Админ панель</a>
                    </li>
                    @endif

                </ul>

            </nav>

            <div class="header__profile top-profile">
                <div class="top-profile__content">

                    @if(auth()->user())
                    <div class="top-profile__actions actions">
                        <a class="actions__btn" href=" {{ route('chat.index') }}">
                            <svg class="actions__icon" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0714 18.0699C15.0152 21.1264 10.4898 21.7867 6.78642 20.074C6.23971 19.8539 5.79148 19.676 5.36537 19.676C4.17849 19.6831 2.70117 20.8339 1.93336 20.067C1.16555 19.2991 2.31726 17.8206 2.31726 16.6266C2.31726 16.2004 2.14642 15.7602 1.92632 15.2124C0.212831 11.5097 0.874109 6.98272 3.93026 3.92724C7.8316 0.0244625 14.17 0.0244627 18.0714 3.92623C21.9797 7.83504 21.9727 14.1681 18.0714 18.0699Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                @if (!auth()->user()->getUnreadMessages->count())
                                <path d="M14.9398 11.4131H14.9488" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10.9301 11.4131H10.9391" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.92128 11.413H6.93028" stroke="#23262F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                @else
                                <span> {{auth()->user()->getUnreadMessages->count() }} </span>
                                @endif
                            </svg>

                            @if(auth()->user()->getUnreadMessages->count())
                            <span class="actions__notif"></span>
                            @endif
                        </a>

                        <!-- {{-- <a class="actions__btn" href="#">--}}
                        {{-- <svg class="actions__icon" width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                        {{-- <path fill-rule="evenodd" clip-rule="evenodd" d="M10 16.8477C15.6392 16.8477 18.2481 16.1242 18.5 13.2205C18.5 10.3188 16.6812 10.5054 16.6812 6.94514C16.6812 4.16417 14.0452 1.00003 10 1.00003C5.95477 1.00003 3.31885 4.16417 3.31885 6.94514C3.31885 10.5054 1.5 10.3188 1.5 13.2205C1.75295 16.1352 4.36177 16.8477 10 16.8477Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />--}}
                        {{-- <path d="M12.3889 19.8572C11.0247 21.372 8.89672 21.3899 7.51953 19.8572" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />--}}
                        {{-- </svg>--}}

                        {{-- <span class="actions__notif"></span>--}}
                        {{-- </a>--}}

                        {{-- <a class="actions__btn" href="#">--}}
                        {{-- <svg class="actions__icon" width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                        {{-- <path fill-rule="evenodd" clip-rule="evenodd" d="M16.739 5.15367C16.739 2.40279 14.8583 1.30003 12.1506 1.30003H5.79167C3.16711 1.30003 1.2002 2.3276 1.2002 4.97021V19.694C1.2002 20.4198 1.98115 20.877 2.61373 20.5221L8.99568 16.9421L15.3225 20.5161C15.9561 20.873 16.739 20.4158 16.739 19.689V5.15367Z" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />--}}
                        {{-- <path d="M5.27148 8.02806H12.5898" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />--}}
                        {{-- </svg>--}}

                        {{-- <span class="actions__notif"></span>--}}
                        {{-- </a>--}} -->
                    </div>

                    <div class="top-profile__avatar">
                        <img @if(auth()->user() && auth()->user()->avatar()->first()) src="{{ Storage::url(auth()->user()->avatar()->first()->path )}}"
                        @else src="{{ asset('images/icon-avatar.png' )}}"
                        @endif alt="Name" class="top-profile__img">
                    </div>
                    @endif

                    @if(auth()->guest())
                    <a class="nav-menu__btn btn btn-white" href="{{ route('loginPage') }}">Войти</a>
                    @endif

                </div>
                @if(auth()->user())
                <a class="nav-menu__btn btn btn-blue" href="{{route('user.profile.createAd')}}">Выставить объявление</a>

                <div class="top-profile__menu profile-menu">

                    <div class="profile-menu__content">
                        <ul class="profile-menu__list">
                            <a href="{{ route('user.profile') }}">
                                <li class="profile-menu__item">Посмотреть профиль</li>
                            </a>

                            <!-- <a href="#">
                                <li class="profile-menu__item">
                                    <span>
                                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.8916 12.4599L8.21883 8.21885L12.4599 6.89162L11.1326 11.1326L6.8916 12.4599Z" stroke="#23262F" stroke-opacity="0.6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <circle cx="9.67565" cy="9.67575" r="8.00914" stroke="#23262F" stroke-opacity="0.6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    Нужна помощь?
                                </li>
                            </a> -->

                            <a href="{{route('user.profile.personalData')}}">
                                <li class="profile-menu__item">
                                    <span>
                                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0022 10.3167C15.3002 10.475 15.5302 10.725 15.692 10.975C16.0071 11.4917 15.9815 12.125 15.675 12.6833L15.0788 13.6833C14.7637 14.2167 14.1761 14.55 13.5714 14.55C13.2733 14.55 12.9412 14.4667 12.6687 14.3C12.4473 14.1583 12.1918 14.1083 11.9192 14.1083C11.0761 14.1083 10.3693 14.8 10.3437 15.625C10.3437 16.5834 9.56022 17.3334 8.58084 17.3334H7.42262C6.43473 17.3334 5.65122 16.5834 5.65122 15.625C5.63419 14.8 4.92733 14.1083 4.08422 14.1083C3.80318 14.1083 3.54769 14.1583 3.33478 14.3C3.06226 14.4667 2.7216 14.55 2.43205 14.55C1.81887 14.55 1.23124 14.2167 0.91614 13.6833L0.328513 12.6833C0.0134089 12.1417 -0.00362382 11.4917 0.311481 10.975C0.447742 10.725 0.703232 10.475 0.992787 10.3167C1.23124 10.2 1.38454 10.0083 1.52932 9.78333C1.95513 9.06666 1.69964 8.125 0.975755 7.69999C0.132638 7.22499 -0.139885 6.16666 0.345546 5.34165L0.91614 4.35832C1.41009 3.53332 2.46611 3.24165 3.31775 3.72498C4.05867 4.12498 5.02101 3.85832 5.45535 3.14998C5.59161 2.91665 5.66826 2.66665 5.65122 2.41665C5.63419 2.09165 5.72787 1.78331 5.88968 1.53331C6.20478 1.01664 6.77538 0.683308 7.39707 0.666641H8.59788C9.22808 0.666641 9.79868 1.01664 10.1138 1.53331C10.2671 1.78331 10.3693 2.09165 10.3437 2.41665C10.3267 2.66665 10.4033 2.91665 10.5396 3.14998C10.9739 3.85832 11.9363 4.12498 12.6857 3.72498C13.5288 3.24165 14.5934 3.53332 15.0788 4.35832L15.6494 5.34165C16.1433 6.16666 15.8708 7.22499 15.0192 7.69999C14.2953 8.125 14.0398 9.06666 14.4741 9.78333C14.6104 10.0083 14.7637 10.2 15.0022 10.3167ZM5.59157 9.00832C5.59157 10.3167 6.67315 11.3583 8.01021 11.3583C9.34728 11.3583 10.4033 10.3167 10.4033 9.00832C10.4033 7.69999 9.34728 6.64998 8.01021 6.64998C6.67315 6.64998 5.59157 7.69999 5.59157 9.00832Z" fill="#23262F" />
                                        </svg>

                                    </span>
                                    Настройский профилия
                                </li>
                            </a>

                            <a href="{{route('user.profile.listAds')}}">
                                <li class="profile-menu__item">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 4.41648C1.5 2.22881 1.52342 1.49982 4.41666 1.49982C7.3099 1.49982 7.33332 2.22881 7.33332 4.41648C7.33332 6.60415 7.34255 7.33314 4.41666 7.33314C1.49077 7.33314 1.5 6.60415 1.5 4.41648Z" stroke="#23262F" stroke-opacity="0.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6665 4.41648C10.6665 2.22881 10.6899 1.49982 13.5832 1.49982C16.4764 1.49982 16.4998 2.22881 16.4998 4.41648C16.4998 6.60415 16.5091 7.33314 13.5832 7.33314C10.6573 7.33314 10.6665 6.60415 10.6665 4.41648Z" stroke="#23262F" stroke-opacity="0.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.5 13.5831C1.5 11.3955 1.52342 10.6665 4.41666 10.6665C7.3099 10.6665 7.33332 11.3955 7.33332 13.5831C7.33332 15.7708 7.34255 16.4998 4.41666 16.4998C1.49077 16.4998 1.5 15.7708 1.5 13.5831Z" stroke="#23262F" stroke-opacity="0.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6665 13.5831C10.6665 11.3955 10.6899 10.6665 13.5832 10.6665C16.4764 10.6665 16.4998 11.3955 16.4998 13.5831C16.4998 15.7708 16.5091 16.4998 13.5832 16.4998C10.6573 16.4998 10.6665 15.7708 10.6665 13.5831Z" stroke="#23262F" stroke-opacity="0.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                    Мои объявления
                                </li>
                            </a>

                            <a href="#">
                                <li class="profile-menu__item">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.2915 1.70798L3.02484 2.00798L3.82733 11.5688C3.8915 12.3496 4.544 12.9488 5.32733 12.9463H14.4182C15.1657 12.948 15.7998 12.398 15.9057 11.658L16.6965 6.19297C16.7848 5.58214 16.3607 5.01547 15.7507 4.92714C15.6973 4.91964 3.30317 4.91547 3.30317 4.91547" stroke="#23262F" stroke-opacity="0.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10.7705 7.9954H13.0813" stroke="#23262F" stroke-opacity="0.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.96163 15.8351C5.21247 15.8351 5.41497 16.0384 5.41497 16.2884C5.41497 16.5393 5.21247 16.7426 4.96163 16.7426C4.7108 16.7426 4.5083 16.5393 4.5083 16.2884C4.5083 16.0384 4.7108 15.8351 4.96163 15.8351Z" fill="#23262F" fill-opacity="0.5" stroke="#23262F" stroke-opacity="0.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.362 15.8351C14.6129 15.8351 14.8162 16.0384 14.8162 16.2884C14.8162 16.5393 14.6129 16.7426 14.362 16.7426C14.1112 16.7426 13.9087 16.5393 13.9087 16.2884C13.9087 16.0384 14.1112 15.8351 14.362 15.8351Z" fill="#23262F" fill-opacity="0.5" stroke="#23262F" stroke-opacity="0.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    Мои покупки
                                </li>
                            </a>

                            <a href="{{ route('logout') }}">
                                <li class="profile-menu__item">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.5134 5.15756V4.38006C11.5134 2.68423 10.1384 1.30923 8.44255 1.30923H4.38006C2.68506 1.30923 1.31006 2.68423 1.31006 4.38006V13.6551C1.31006 15.3509 2.68506 16.7259 4.38006 16.7259H8.45088C10.1417 16.7259 11.5134 15.3551 11.5134 13.6642V12.8784" stroke="#EF4646" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M17.1748 9.01747H7.14062" stroke="#EF4646" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M14.7344 6.58823L17.1744 9.01739L14.7344 11.4474" stroke="#EF4646" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    Выйти из аккуанта
                                </li>
                            </a>

                        </ul>
                    </div>

                </div>
                @endif
            </div>
        </div>
    </div>
</header>