<footer id='footer' class="footer">

    <div class="container footer__container">

        <div class="footer__logo">

            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="Лого" class="logo">
            </a>

        </div>

        <nav class="footer__menu">
            <a href="{{ route('home') }}" class="footer__menu-link">Главная</a>
            <a href="{{ route('searchPage') }}" class="footer__menu-link">Поиск</a>
            <a href="/about" class="footer__menu-link">О проекте</a>
            <a href="{{ route('getSupport') }}" class="footer__menu-link">Связь с техподдержкой</a>
        </nav>

        <div class="footer__copy">
            Copyright © <?php echo date('Y'); ?>. All rights reserved
        </div>

    </div>

</footer>