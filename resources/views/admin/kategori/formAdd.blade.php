@extends('admin.layout.main')

@section('content')
<div class="row">
  <div class="col-lg-8">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Tambah kategori</h2>
      </div>
      <div class="card-body">
        <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="kategori">
          @error('nama')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-footer pt-5 border-top">
          <button type="submit" class="btn btn-primary btn-default">Save</button>
          <a href="{{ url('kategori') }}" class="btn btn-secondary">back</a>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection