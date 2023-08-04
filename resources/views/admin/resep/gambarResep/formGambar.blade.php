
<div class="card card-default">
  <div class="card-header card-header-border-bottom">
    <h3>Tambah Gambar</h3>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ url('resep/gambar', $resep->id) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="resep_id" value="{{ $resep->id }}">
    <div class="form-group">
      <label for="image">Gambar Resep</label>
      <input type="file" name="nama" id="image" class="form-control-file @error('nama') is-invalid @enderror" placeholder="Gambar">
      @error('nama')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>   
    <div class="form-footer pt-5 border-top">
      <button type="submit" class="btn btn-primary btn-default">Save</button>
      <a href="{{ url('/resep') }}" class="btn btn-secondary btn-default">Back</a>
    </div>
    </form>
  </div>
</div> 