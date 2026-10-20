<x-mainpage title="Új sütemény">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      @if (session('failed'))
        <div class="alert alert-danger">{{ session('failed') }}</div>
      @endif

      <form action="{{ route('crud.store') }}" method="POST" class="bg-secondary p-4 border-inner" novalidate>
        @csrf
        @include('crud._form')

        <div class="d-flex justify-content-between">
          <a href="{{ route('crud.index') }}" class="btn btn-outline-dark">Vissza</a>
          <button type="submit" class="btn btn-primary px-4">Mentés</button>
        </div>
      </form>
    </div>
  </div>
</x-mainpage>
