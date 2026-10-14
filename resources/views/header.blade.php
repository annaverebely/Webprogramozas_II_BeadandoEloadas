<!-- Felső sáv (csak nagy képernyőn) -->
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
          <span>+36 76 123 4567</span>
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
      @if (Auth::check())
        <a href="/dashboard" class="nav-item nav-link">Dashboard</a>
      @endif
      <a href="/introduction" class="nav-item nav-link {{ request()->is('introduction') ? 'active' : '' }}">Introduction</a>
      @if (Auth::check())
        <a href="/user" class="nav-item nav-link {{ request()->is('user') ? 'active' : '' }}">User</a>
        @if (Auth::User()->role==1)
          <a href="/admin" class="nav-item nav-link {{ request()->is('admin') ? 'active' : '' }}">Admin</a>
        @endif
        <form method="post" action="/logout" class="d-flex align-items-center">
          @csrf
          <button type="submit" class="nav-item nav-link btn btn-link border-0">Logout</button>
        </form>
      @endif
    </div>
  </div>
</nav>
