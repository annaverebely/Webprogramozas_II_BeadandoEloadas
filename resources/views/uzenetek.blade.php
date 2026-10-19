<x-mainpage title="Üzenetek">
  <h2 class="text-uppercase mb-3">Beérkezett üzenetek</h2>
  <p class="mb-4">A Kapcsolat űrlapon küldött {{ $uzenetek->count() }} üzenet, a legfrissebbel kezdve.</p>

  <div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>Küldés ideje</th>
          <th>Név</th>
          <th>E-mail</th>
          <th>Tárgy</th>
          <th>Üzenet</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($uzenetek as $uzenet)
          <tr>
            <td class="text-nowrap">{{ $uzenet->created_at->format('Y.m.d. H:i') }}</td>
            <td class="fw-bold">{{ $uzenet->nev }}</td>
            <td>{{ $uzenet->email }}</td>
            <td>{{ $uzenet->targy }}</td>
            <td>{{ $uzenet->uzenet }}</td>
          </tr>
        @empty
          <tr><td colspan="5" class="text-center text-muted py-4">Még nem érkezett üzenet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</x-mainpage>