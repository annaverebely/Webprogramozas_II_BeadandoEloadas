<x-mainpage title="Nincs jogosultság">
  <div class="text-center py-5">
    <i class="fa fa-lock fa-4x text-primary mb-4"></i>
    <h3 class="mb-3">{{ $exception->getMessage() ?: 'Ehhez az oldalhoz nincs jogosultsága.' }}</h3>
    <a href="/" class="btn btn-primary border-inner py-2 px-4 mt-3">Vissza a Főoldalra</a>
  </div>
</x-mainpage>
