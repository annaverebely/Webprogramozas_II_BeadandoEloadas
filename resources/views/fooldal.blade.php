<x-mainpage :fluid="true">

  <!-- Hero -->
  <section class="hero">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-7">
          <p class="hero-tagline mb-2 fade-up">Minden falat egy ünnep</p>
          <h1 class="hero-title text-uppercase text-white mb-4 fade-up delay-1">Édes <span>Cukrászda</span></h1>
          <p class="hero-lead mb-5 fade-up delay-2">
            Kézműves torták, sütemények és teasütemények Kecskemét szívében –
            díjnyertes receptekkel, glutén-, laktóz- és cukormentes változatokban is.
          </p>
          <div class="fade-up delay-3">
            <a href="/adatbazis" class="btn btn-primary border-inner py-3 px-5 me-3 mb-3">Kínálatunk</a>
            <a href="/kapcsolat" class="btn btn-outline-light py-3 px-5 mb-3">Kapcsolat</a>
          </div>
        </div>
      </div>
    </div>

    <div class="hero-badge fade-up delay-4">
      <span class="num">5</span>
      <small class="text-uppercase">Magyarország<br>Tortája díj</small>
    </div>

    <a href="#rolunk" class="hero-scroll"><i class="bi bi-chevron-double-down"></i></a>
  </section>

  <!-- Rólunk -->
  <div class="container-fluid pt-5" id="rolunk">
    <div class="container">
      <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
        <h2 class="text-primary font-secondary">Rólunk</h2>
        <h1 class="display-4 text-uppercase">Üdvözöljük!</h1>
      </div>
      <div class="row gx-5">
        <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
          <div class="position-relative h-100">
            <img class="position-absolute w-100 h-100" src="{{ asset('img/about.jpg') }}" style="object-fit: cover;" alt="Csokoládétorta">
          </div>
        </div>
        <div class="col-lg-6 pb-5">
          <h4 class="mb-4">Hagyományos receptek, friss alapanyagok, minden nap frissen sütve.</h4>
          <p class="mb-5">
            Az Édes Cukrászda kínálatában a klasszikus tortáktól a bejgliken és pitéken át a sós
            teasüteményekig mindent megtalál. Ez a webalkalmazás bemutatja süteményeinket, áraikat
            és azt, hogy melyik mitől mentes – a kínálatot az <a href="/adatbazis">Adatbázis</a>
            menüben böngészheti, a statisztikákat a <a href="/diagram">Diagram</a> menüben láthatja.
          </p>
          <div class="row g-5">
            <div class="col-sm-6">
              <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                <i class="fa fa-award fa-2x text-white"></i>
              </div>
              <h4 class="text-uppercase">Díjnyertes</h4>
              <p class="mb-0">Öt süteményünk nyerte el a Magyarország Tortája versenyen a díjat.</p>
            </div>
            <div class="col-sm-6">
              <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                <i class="fa fa-leaf fa-2x text-white"></i>
              </div>
              <h4 class="text-uppercase">Mentes változatok</h4>
              <p class="mb-0">Glutén-, laktóz-, cukor- és tojásmentes sütemények is várják.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Számok -->
  <div class="container-fluid bg-img py-5 my-5">
    <div class="container py-5">
      <div class="row gx-5 gy-4">
        <div class="col-lg-3 col-md-6">
          <div class="d-flex">
            <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
              <i class="fa fa-birthday-cake text-white"></i>
            </div>
            <div class="ps-4">
              <h6 class="text-primary text-uppercase">Féle sütemény</h6>
              <h1 class="display-5 text-white mb-0" data-toggle="counter-up">139</h1>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="d-flex">
            <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
              <i class="fa fa-th-large text-white"></i>
            </div>
            <div class="ps-4">
              <h6 class="text-primary text-uppercase">Kategória</h6>
              <h1 class="display-5 text-white mb-0" data-toggle="counter-up">10</h1>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="d-flex">
            <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
              <i class="fa fa-award text-white"></i>
            </div>
            <div class="ps-4">
              <h6 class="text-primary text-uppercase">Díjnyertes</h6>
              <h1 class="display-5 text-white mb-0" data-toggle="counter-up">5</h1>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="d-flex">
            <div class="bg-primary border-inner d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
              <i class="fa fa-leaf text-white"></i>
            </div>
            <div class="ps-4">
              <h6 class="text-primary text-uppercase">Mentes sütemény</h6>
              <h1 class="display-5 text-white mb-0" data-toggle="counter-up">29</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Az alkalmazás menüpontjai -->
  <div class="container-fluid py-5">
    <div class="container">
      <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
        <h2 class="text-primary font-secondary">Fedezze fel</h2>
        <h1 class="display-4 text-uppercase">Mit talál nálunk?</h1>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="feature-card bg-secondary h-100">
            <img class="w-100" src="{{ asset('img/cake-1.jpg') }}" alt="Torták">
            <div class="p-4">
              <h4 class="text-uppercase"><i class="fa fa-database text-primary me-2"></i>Adatbázis</h4>
              <p>Böngéssze teljes kínálatunkat: a sütemények típusát, árát és mentességeit.</p>
              <a href="/adatbazis" class="btn btn-primary border-inner py-2 px-4">Megnézem</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="feature-card bg-secondary h-100">
            <img class="w-100" src="{{ asset('img/cake-2.jpg') }}" alt="Sütemények">
            <div class="p-4">
              <h4 class="text-uppercase"><i class="fa fa-chart-pie text-primary me-2"></i>Diagram</h4>
              <p>Látványos grafikonok a kínálatról: mennyi süteményünk van típusonként és milyen áron.</p>
              <a href="/diagram" class="btn btn-primary border-inner py-2 px-4">Megnézem</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="feature-card bg-secondary h-100">
            <img class="w-100" src="{{ asset('img/cake-3.jpg') }}" alt="Teasütemények">
            <div class="p-4">
              <h4 class="text-uppercase"><i class="fa fa-envelope text-primary me-2"></i>Kapcsolat</h4>
              <p>Rendelne vagy kérdése van? Írjon nekünk, hamarosan válaszolunk!</p>
              <a href="/kapcsolat" class="btn btn-primary border-inner py-2 px-4">Írok</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</x-mainpage>
