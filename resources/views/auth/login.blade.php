<x-mainpage title="Bejelentkezés">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-8">
      @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
      @endif

      {{-- A Starter Kit bejelentkezési útvonalára küld (AuthenticatedSessionController@store) --}}
      <form method="POST" action="{{ route('login') }}" class="bg-secondary border-inner p-4" novalidate>
        @csrf

        <div class="mb-3">
          <label for="email" class="form-label fw-bold">E-mail cím</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" autofocus autocomplete="email"
                 class="form-control @error('email') is-invalid @enderror" placeholder="email@example.com">
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label fw-bold">Jelszó</label>
          <input type="password" id="password" name="password" autocomplete="current-password"
                 class="form-control @error('password') is-invalid @enderror">
          @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
          <div class="form-check">
            <input type="checkbox" id="remember" name="remember" value="1" class="form-check-input" @checked(old('remember'))>
            <label for="remember" class="form-check-label">Emlékezzen rám</label>
          </div>
          <a href="{{ route('password.request') }}" class="small">Elfelejtett jelszó?</a>
        </div>

        <button type="submit" class="btn btn-primary border-inner w-100 py-2">Bejelentkezés</button>

        <p class="text-center mt-3 mb-0">Még nincs fiókja? <a href="{{ route('register') }}">Regisztráció</a></p>
      </form>
    </div>
  </div>
</x-mainpage>
