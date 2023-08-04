@extends('admin.layout.main')

@section('content')
<div class="row">
  <div class="col-lg-9">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Tambah Resep</h2>
      </div>
      <div class="card-body">
          <form method="POST" action="{{ url('resep') }}">
          @csrf
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="judul">
            @error('judul')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="durasi">Durasi membuat</label>
            <input type="number" name="durasi" class="form-control @error('durasi') is-invalid @enderror" placeholder="Berapa durasi untuk membuat resep ini? (Menit)">
            @error('durasi')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="porsi">Porsi</label>
            <input type="number" name="porsi" class="form-control @error('porsi') is-invalid @enderror" placeholder="Berapa porsi untuk resep ini?">
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
                <option value="{{ $ktg->id }}">{{ $ktg->nama }}</option>
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
            <input id="deskripsi" type="hidden" name="deskripsi">
            <trix-editor input="deskripsi"></trix-editor>
          </div>
          

          {{-- @if ($product)
            @if ($product->parent_id == NULL)
              @include('admin.products.configurable')
            @else
              @include('admin.products.simple')                            
            @endif
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="description">{{ !empty($product) ? $product->description : '' }}</textarea>
            </div>
          @endif --}}
          <div class="form-footer pt-5 border-top">
            <button type="submit" class="btn btn-primary btn-default">Save</button>
            <a href="{{ url('products') }}" class="btn btn-secondary btn-default">Back</a>
          </div>
        </form>
      </div>
    </div>  
  </div>
</div>
@endsection