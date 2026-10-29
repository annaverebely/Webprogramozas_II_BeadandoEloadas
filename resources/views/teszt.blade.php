<x-mainpage title="Teszt">
  <h2 class="text-uppercase mb-3">Rendelés-kalkulátor</h2>
  <p class="mb-4">
        Számolja ki rendelése végösszegét! Ha a kedvezmény utáni összeg eléri a 10 000 Ft-ot, a házhozszállítás ingyenes, alatta 990 Ft.
  </p>

  <div class="row g-4">
    <div class="col-lg-6">
      <form action="/teszt" method="POST" class="border p-4">
        @csrf
        <div class="mb-3">
          <label for="egysegar" class="form-label">Egységár (Ft)</label>
          <input type="number" id="egysegar" name="egysegar" class="form-control" value="{{ $egysegar }}">
        </div>
        <div class="mb-3">
          <label for="mennyiseg" class="form-label">Mennyiség (db)</label>
          <input type="number" id="mennyiseg" name="mennyiseg" class="form-control" value="{{ $mennyiseg }}">
        </div>
        <div class="mb-3">
          <label for="kedvezmeny" class="form-label">Kedvezmény (%)</label>
          <input type="number" id="kedvezmeny" name="kedvezmeny" class="form-control" value="{{ $kedvezmeny }}">
        </div>
        <div class="form-check mb-3">
          <input type="checkbox" id="hazhoz" name="hazhoz" value="1" class="form-check-input" {{ $hazhoz ? 'checked' : '' }}>
          <label for="hazhoz" class="form-check-label">Házhozszállítást kérek</label>
        </div>
        <button type="submit" class="btn btn-primary">Számol</button>
      </form>
    </div>

    <div class="col-lg-6">
      @if ($hiba !== null)
        <div class="alert alert-danger">
          <h5>Hiba</h5>
          <p class="mb-0">{{ $hiba }}</p>
        </div>
      @endif

      @if ($eredmeny !== null)
        <div class="border p-4">
          <h5 class="text-uppercase mb-3">Rendelés összesítő</h5>
          <table class="table mb-0">
            <tr><td>Részösszeg ({{ $mennyiseg }} db × {{ $egysegar }} Ft)</td>
                <td class="text-end">{{ number_format($eredmeny['reszosszeg'], 0, ',', ' ') }} Ft</td></tr>
            <tr><td>Kedvezmény ({{ $kedvezmeny }}%)</td>
                <td class="text-end">-{{ number_format($eredmeny['kedvezmeny'], 0, ',', ' ') }} Ft</td></tr>
            <tr><td>Szállítási díj</td>
                <td class="text-end">{{ number_format($eredmeny['szallitas'], 0, ',', ' ') }} Ft</td></tr>
            <tr class="fw-bold"><td>Végösszeg</td>
                <td class="text-end">{{ number_format($eredmeny['vegosszeg'], 0, ',', ' ') }} Ft</td></tr>
          </table>
        </div>
      @endif
    </div>
  </div>
</x-mainpage>