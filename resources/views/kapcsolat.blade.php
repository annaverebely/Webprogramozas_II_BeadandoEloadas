<x-mainpage title="Kapcsolat">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <h2 class="text-uppercase mb-3">Írjon nekünk</h2>
      <p class="mb-4">Kérdése van a süteményekkel vagy egy rendeléssel kapcsolatban? Küldjön üzenetet, és hamarosan válaszolunk.</p>

      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="post" action="/kapcsolat" novalidate>
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label for="nev" class="form-label">Név</label>
            <input type="text" id="nev" name="nev" value="{{ old('nev') }}"
                   class="form-control @error('nev') is-invalid @enderror">
            @error('nev')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="col-12">
            <label for="targy" class="form-label">Tárgy</label>
            <input type="text" id="targy" name="targy" value="{{ old('targy') }}"
                   class="form-control @error('targy') is-invalid @enderror">
            @error('targy')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="col-12">
            <label for="uzenet" class="form-label">Üzenet</label>
            <textarea id="uzenet" name="uzenet" rows="6"
                      class="form-control @error('uzenet') is-invalid @enderror">{{ old('uzenet') }}</textarea>
            @error('uzenet')<div class="invalid-feedback">{{ $message }}</div>@enderror
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary border-inner py-3 px-5">Küldés</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</x-mainpage>
