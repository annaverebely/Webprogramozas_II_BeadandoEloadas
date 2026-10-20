<x-mainpage title="CRUD – Sütemények">
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <h2 class="text-uppercase mb-3">Sütemény adatok kezelése</h2>
    <a href="{{ route('crud.create') }}" class="btn btn-primary border-inner py-2 px-4 mb-3">
      <i class="fa fa-plus me-2"></i>Új sütemény
    </a>
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
          <th class="text-center">Műveletek</th>
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
            <td class="text-center text-nowrap">
              <a href="{{ route('crud.edit', $suti) }}" class="btn btn-sm btn-dark">
                <i class="fa fa-pen me-1"></i>Szerkesztés
              </a>
              
              <form action="{{ route('crud.destroy', $suti) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Biztosan törli: {{ addslashes($suti->nev) }}? Az árai és mentességei is törlődnek.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                  <i class="fa fa-trash me-1"></i>Törlés
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center text-muted py-4">Nincs sütemény az adatbázisban.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Lapozó: 15 sütemény oldalanként --}}
  <div class="d-flex justify-content-center">
    {{ $sutik->links() }}
  </div>
</x-mainpage>
