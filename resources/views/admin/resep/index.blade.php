@extends('admin.layout.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Daftar Resep Makanan</h2>
        </div>
        <div class="card-body">
          @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
          @endif
          <table class="table table-bordered table-stripped">
            <thead>
                <th>#</th>
                <th>Judul</th>
                <th>Slug</th>
                <th>Porsi</th>
                <th>Durasi Membuat</th>
                <th>Kategori</th>
                {{-- <th style="width:15%">Action</th> --}}
            </thead>
            <tbody>
                @forelse ($resep as $resep)
                  <tr>    
                    <td>{{ $resep->id }}</td>
                    <td>{{ $resep->judul }}</td>
                    <td>{{ $resep->slug }}</td>
                    <td>{{ $resep->porsi }}</td>
                    <td>{{ $resep->durasi }}</td>
                    <td>{{ $resep->resepKategori->nama }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td colspan="6">
                      <a href="{{ url('resep/'. $resep->id .'/gambar-makanan') }}" class="btn btn-success btn-sm">Gambar Makanan</a>
                      <a href="{{ url('resep/'. $resep->id .'/bahan-makanan') }}" class="btn btn-success btn-sm">Bahan Makanan</a>
                      <a href="{{ url('resep/'. $resep->id .'/cara-membuat') }}" class="btn btn-success btn-sm">Cara Membuat</a>
                      <a href="{{ url('resep/'. $resep->id .'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                      <a href="{{ url('resep/' . $resep->id) }}" class="delete" style="display:inline-block"
                        onclick="event.preventDefault(); if (confirm('Apakah yakin menghapus?')) { document.getElementById('delete-form-{{ $resep->id }}').submit(); }">
                        <button type="button" class="btn btn-danger btn-sm">Remove</button>
                      </a>
                      <form id="delete-form-{{ $resep->id }}" action="{{ url('resep/' . $resep->id) }}" method="POST" style="display: none;">
                          @method('DELETE')
                          @csrf
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7">No records found</td>
                    <td></td>
                  </tr>
                @endforelse
            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <a href="{{ url('resep/create') }}" class="btn btn-primary">Add New</a>
        </div>
      </div>
    </div>
  </div>
@endsection
