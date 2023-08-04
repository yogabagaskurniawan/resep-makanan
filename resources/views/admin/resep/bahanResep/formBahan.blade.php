@php
  $data = !empty($bahanResep) ? 'Edit' : 'Tambah';
@endphp

<div class="card card-default">
  <div class="card-header card-header-border-bottom">
    <h3>{{ $data }} Bahan Resep</h3>
  </div>
  <div class="card-body">
    @if (!empty($bahanResep))
      <form method="POST" action="{{ url('resep/bahan', $bahanResep->id) }}">
      @method('PUT')
      <input type="hidden" name="id">
    @else
      <form method="POST" action="{{ url('resep/bahan', $resep->id) }}" enctype="multipart/form-data">
    @endif
    @csrf
    <input type="hidden" name="resep_id" value="{{ $resep->id }}">
    <div class="form-group">
      <label for="keterangan">Keterangan</label>
      @error('keterangan')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
      <input id="keterangan" type="hidden" name="keterangan"  value="{{ $bahanResep->keterangan ?? '' }}">
      <trix-editor input="keterangan"></trix-editor>
    </div>
    <div class="form-footer pt-5 border-top">
      <button type="submit" class="btn btn-primary btn-default">Save</button>
      <a href="{{ url('/resep') }}" class="btn btn-secondary btn-default">Back</a>
    </div>
    </form>
  </div>
</div> 