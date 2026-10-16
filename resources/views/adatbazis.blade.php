<x-mainpage title="Adatbázis">
  <h2 class="text-uppercase mb-3">Süteménykínálatunk</h2>
  <p class="mb-4">
    A cukrászda {{ $sutik->count() }} süteménye az áraikkal és a mentességeikkel.
    Az adatok három táblából származnak: <strong>suti</strong>, <strong>ar</strong> és <strong>tartalom</strong>.
  </p>

  <div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>Név</th>
          <th>Típus</th>
          <th class="text-center">Díjazott</th>
          <th>Árak</th>
          <th>Mentes</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sutik as $suti)
          <tr>
            <td class="fw-bold">{{ $suti->nev }}</td>
            <td>{{ $suti->tipus }}</td>
            <td class="text-center">{{ $suti->dijazott ? 'igen' : '–' }}</td>
            <td>
              @foreach ($suti->arak as $ar)
                {{ number_format($ar->ertek, 0, ',', ' ') }} Ft / {{ $ar->egyseg }}<br>
              @endforeach
            </td>
            <td>
              @foreach ($suti->tartalmak as $tartalom)
                <span class="badge bg-primary">{{ $mentesNevek[$tartalom->mentes] ?? $tartalom->mentes }}</span>
              @endforeach
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-mainpage>
