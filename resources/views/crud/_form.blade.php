
<div class="mb-3">
  <label for="nev" class="form-label fw-bold">Név *</label>
  <input type="text" id="nev" name="nev" maxlength="100"
         class="form-control @error('nev') is-invalid @enderror"
         value="{{ old('nev', $suti->nev ?? '') }}">
  @error('nev') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label for="tipus" class="form-label fw-bold">Típus *</label>
  <input type="text" id="tipus" name="tipus" maxlength="50" list="tipuslista"
         class="form-control @error('tipus') is-invalid @enderror"
         value="{{ old('tipus', $suti->tipus ?? '') }}"
         placeholder="Válasszon a listából, vagy írjon be újat">
  <datalist id="tipuslista">
    @foreach ($tipusok as $tipus)
      <option value="{{ $tipus }}">
    @endforeach
  </datalist>
  @error('tipus') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-check mb-4">
  <input type="checkbox" id="dijazott" name="dijazott" value="1" class="form-check-input"
         @checked(old('dijazott', $suti->dijazott ?? false))>
  <label for="dijazott" class="form-check-label">Díjazott (Magyarország Tortája)</label>
</div>
