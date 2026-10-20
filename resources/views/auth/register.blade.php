<x-mainpage title="Regisztráció">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-8">
      {{-- A Starter Kit regisztrációs útvonalára küld (RegisteredUserController@store) --}}
      <form method="POST" action="{{ route('register') }}" class="bg-secondary border-inner p-4" novalidate>
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label fw-bold">Név</label>
          <input type="text" id="name" name="name" value="{{ old('name') }}" autofocus autocomplete="name"
                 class="form-control @error('name') is-invalid @enderror">
          @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label fw-bold">E-mail cím</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email"
                 class="form-control @error('email') is-invalid @enderror" placeholder="email@example.com">
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label fw-bold">Jelszó (legalább 8 karakter)</label>
          <input type="password" id="password" name="password" autocomplete="new-password"
                 class="form-control @error('password') is-invalid @enderror">
          @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
          <label for="password_confirmation" class="form-label fw-bold">Jelszó megerősítése</label>
          <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password"
                 class="form-control">
        </div>

        <button type="submit" class="btn btn-primary border-inner w-100 py-2">Regisztráció</button>

        <p class="text-center mt-3 mb-0">Már van fiókja? <a href="{{ route('login') }}">Bejelentkezés</a></p>
      </form>
    </div>
  </div>
</x-mainpage>
