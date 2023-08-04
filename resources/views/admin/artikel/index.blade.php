@extends('admin.layout.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Daftar Artikel</h2>
        </div>
        <div class="card-body">
          @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
          @endif
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Slug</th>
                <th scope="col">Gambar</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1
              @endphp
              @forelse ($artikel as $artikel)
              <tr>
                  <td>{{ $artikel->id }}</td>
                  <td>{{ $artikel->judul }}</td>
                  <td>{{ $artikel->slug }}</td>
                  <td><img src="{{ asset('storage/'.$artikel->gambar) }}" style="width:70px"/></td>
                  <td>{{ $artikel->deskripsi }}</td>
                  <td>
                    <a href="{{ url('artikel/' . $artikel->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ url('artikel/' . $artikel->id) }}" class="delete" style="display:inline-block"
                      onclick="event.preventDefault(); if (confirm('Apakah anda yakin menghapus?')) { document.getElementById('delete-form-{{ $artikel->id }}').submit(); }">
                      <button type="button" class="btn btn-danger btn-sm">Remove</button>
                    </a>
                    <form id="delete-form-{{ $artikel->id }}" action="{{ url('artikel/' . $artikel->id) }}" method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form> 
                  </td>
              </tr>
              @empty
                <tr>
                  <td colspan="4">No records found</td>
                  <td></td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="card-footer text-right"> 
          <a href="{{ url('artikel/create') }}" class="btn btn-primary">Tambah</a>
        </div>
      </div>
    </div>
  </div>
@endsection