<x-mainpage title="CRUD – Sütemények">
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <h2 class="text-uppercase mb-3">Sütemény adatok kezelése</h2>
  </div>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if (session('failed'))
    <div class="alert alert-danger">{{ session('failed') }}</div>
  @endif

  <div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Név</th>
          <th>Típus</th>
          <th class="text-center">Díjazott</th>
          <th class="text-center">Árak száma</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($sutik as $suti)
          <tr>
            <td>{{ $suti->id }}</td>
            <td class="fw-bold">{{ $suti->nev }}</td>
            <td>{{ $suti->tipus }}</td>
            <td class="text-center">{!! $suti->dijazott ? '<i class="fa fa-award text-primary" title="Magyarország Tortája díj"></i>' : '–' !!}</td>
            <td class="text-center">{{ $suti->arak_count }}</td>
          </tr>
        @empty
          <tr><td colspan="5" class="text-center text-muted py-4">Nincs sütemény az adatbázisban.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Lapozó: 15 sütemény oldalanként --}}
  <div class="d-flex justify-content-center">
    {{ $sutik->links() }}
  </div>
</x-mainpage>
