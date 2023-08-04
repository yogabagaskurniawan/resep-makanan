@extends('admin.layout.main')

@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Edit Resep</h2>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ url('resep/' . $resep->id) }}">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{ $resep->id }}">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="judul"  value="{{$resep->judul}}">
            @error('judul')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="durasi">Durasi membuat</label>
            <input type="number" name="durasi" class="form-control @error('durasi') is-invalid @enderror" placeholder="Berapa durasi untuk membuat resep ini? (Menit)"  value="{{$resep->durasi}}">
            @error('durasi')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="porsi">Porsi</label>
            <input type="number" name="porsi" class="form-control @error('porsi') is-invalid @enderror" placeholder="Berapa porsi untuk resep ini?"  value="{{$resep->porsi}}">
            @error('porsi')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="selected_category">Select Kategori</label>
            <select class="form-control" name="selected_category" id="selected_category">
              @foreach ($kategori as $ktg)
                @if (old('selected_category', $resep->kategori_id) == $ktg->id)
                  <option value="{{ $ktg->id }}" selected>{{ $ktg->nama }}</option> 
                @else
                  <option value="{{ $ktg->id }}">{{ $ktg->nama }}</option> 
                @endif
              @endforeach
            </select>
          </div>            
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            @error('deskripsi')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="deskripsi" type="hidden" name="deskripsi"  value="{{$resep->deskripsi}}">
            <trix-editor input="deskripsi"></trix-editor>
          </div>
          <div class="form-footer pt-5 border-top">
            <button type="submit" class="btn btn-primary btn-default">Save</button>
            <a href="{{ url('/resep') }}" class="btn btn-secondary btn-default">Back</a>
          </div>
        </form>
      </div>
    </div>  
  </div>
</div>
@endsection