@extends('admin.layout.main')

@section('content')
<div class="row">
  <div class="col-lg-8">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Edit Artikel</h2>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ url('artikel/' . $artikel->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul" value="{{$artikel->judul}}">
          @error('judul')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="gambar">Gambar Artikel</label>
          <input type="hidden" name="oldImage" value="{{ $artikel->gambar }}">
          <input type="file" name="gambar" id="gambar" class="form-control-file @error('gambar') is-invalid @enderror" placeholder="Gambar" value="{{$artikel->gambar}}">
          @error('gambar')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>  
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          @error('deskripsi')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <input id="deskripsi" type="hidden" name="deskripsi" value="{{$artikel->deskripsi}}">
          <trix-editor input="deskripsi"></trix-editor>
        </div>
        <div class="form-footer pt-5 border-top">
          <button type="submit" class="btn btn-primary btn-default">Save</button>
          <a href="{{ url('artikel') }}" class="btn btn-secondary">back</a>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection