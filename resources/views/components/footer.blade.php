<footer id='footer' class="footer">

  <div class="container footer__container">

    <div class="footer__logo">

      <a href="{{ route('home') }}">
        <img src="{{ asset('images/logo.svg' )}}" alt="Лого" class="logo">
      </a>

    </div>

    <nav class="footer__menu">
      <a href="{{ route('home') }}" class="footer__menu-link">Главная</a>
      <a href="{{ route('searchPage') }}" class="footer__menu-link">Категории</a>
      <a href="#" class="footer__menu-link">О проекте</a>
    </nav>

    <div class="footer__copy">
      Copyright © 2022. All rights reserved
    </div>

  </div>

</footer>