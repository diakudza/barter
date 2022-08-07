<nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Навигация">
  <div class="container nav">

    <a href="{{ route('home') }}" class="logo"><img src="images/logo.svg" alt="Бартер"></a>



    <!-- <a class="navbar-brand logo-image" href="{{ route('home') }}"><img src="images/logo.svg" alt="alternative"></a> -->

    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Раскрыть меню">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav ms-auto navbar-nav-scroll">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('searchPage') }}">Поиск</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services">Доставка</a>
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