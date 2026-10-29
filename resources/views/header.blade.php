
<div class="container-fluid px-0 d-none d-lg-block">
  <div class="row gx-0">
    <div class="col-lg-4 text-center bg-secondary py-3">
      <div class="d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-envelope fs-1 text-primary me-3"></i>
        <div class="text-start">
          <h6 class="text-uppercase mb-1">Írjon nekünk</h6>
          <span>info@edescukraszda.hu</span>
        </div>
      </div>
    </div>
    <div class="col-lg-4 text-center bg-primary border-inner py-3">
      <div class="d-inline-flex align-items-center justify-content-center">
        <a href="/" class="navbar-brand">
          <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-dark me-3"></i>Édes Cukrászda</h1>
        </a>
      </div>
    </div>
    <div class="col-lg-4 text-center bg-secondary py-3">
      <div class="d-inline-flex align-items-center justify-content-center">
        <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
        <div class="text-start">
          <h6 class="text-uppercase mb-1">Hívjon minket</h6>
          <span>+36 76 123 456</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Menüsor -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
  <a href="/" class="navbar-brand d-block d-lg-none">
    <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3"></i>Édes Cukrászda</h1>
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto mx-lg-auto py-0">
      {{-- Mindenki látja --}}
      <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Főoldal</a>
      <a href="/adatbazis" class="nav-item nav-link {{ request()->is('adatbazis*') ? 'active' : '' }}">Adatbázis</a>
      <a href="/kapcsolat" class="nav-item nav-link {{ request()->is('kapcsolat*') ? 'active' : '' }}">Kapcsolat</a>
      <a href="/diagram" class="nav-item nav-link {{ request()->is('diagram*') ? 'active' : '' }}">Diagram</a>
      {{-- Kiegészítő feladat: React menü (a listát mindenki látja, módosítani csak az admin tud) --}}
      <a href="/react" class="nav-item nav-link {{ request()->is('react') ? 'active' : '' }}">React</a>
      {{-- Kiegészítő feladat: Teszt menü --}}
      <a href="/teszt" class="nav-item nav-link {{ request()->is('teszt') ? 'active' : '' }}">Teszt</a>

      @if (Auth::check())
        {{-- Csak bejelentkezett felh látja --}}
        <a href="/uzenetek" class="nav-item nav-link {{ request()->is('uzenetek*') ? 'active' : '' }}">Üzenetek</a>

        @if (Auth::User()->role==1)
          {{-- Csak admin látja --}}
          <a href="/crud" class="nav-item nav-link {{ request()->is('crud*') ? 'active' : '' }}">CRUD</a>
        @endif

        <form method="post" action="/logout" class="d-flex align-items-center">
          @csrf
          <button type="submit" class="nav-item nav-link btn btn-link border-0"
                  title="Bejelentkezve: {{ Auth::User()->name }}">Kijelentkezés</button>
        </form>
      @else
        {{-- Csak látogató látja --}}
        <a href="/login" class="nav-item nav-link">Bejelentkezés</a>
        <a href="/register" class="nav-item nav-link">Regisztráció</a>
      @endif
    </div>
  </div>
</nav>
