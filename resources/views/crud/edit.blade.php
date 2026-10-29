<x-mainpage title="Sütemény szerkesztése">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      @if (session('failed'))
        <div class="alert alert-danger">{{ session('failed') }}</div>
      @endif

      <p class="text-muted">Azonosító: {{ $suti->id }}</p>

      <form action="{{ route('crud.update', $suti) }}" method="POST" class="bg-secondary p-4 border-inner" novalidate>
        @csrf
        @method('PUT')
        
        <input type="hidden" name="vissza" value="{{ old('vissza', url()->previous()) }}">
        @include('crud._form')

        <div class="d-flex justify-content-between">
          <a href="{{ old('vissza', url()->previous()) }}" class="btn btn-outline-dark">Mégse</a>
          <button type="submit" class="btn btn-primary px-4">Módosítás mentése</button>
        </div>
      </form>
    </div>
  </div>
</x-mainpage>
