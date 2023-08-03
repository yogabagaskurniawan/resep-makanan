@extends('admin.layout.main')

@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Daftar Kategori</h2>
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
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $no = 1
              @endphp
              @forelse ($kategori as $ktg)
              <tr>
                  <td>{{ $ktg->id }}</td>
                  <td>{{ $ktg->nama }}</td>
                  <td>{{ $ktg->slug }}</td>
                  <td>
                    <a href="{{ url('kategori/' . $ktg->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ url('kategori/' . $ktg->id) }}" class="delete" style="display:inline-block"
                      onclick="event.preventDefault(); if (confirm('Apakah anda yakin menghapus?')) { document.getElementById('delete-form-{{ $ktg->id }}').submit(); }">
                      <button type="button" class="btn btn-danger btn-sm">Remove</button>
                    </a>
                    <form id="delete-form-{{ $ktg->id }}" action="{{ url('kategori/' . $ktg->id) }}" method="POST" style="display: none;">
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
          <a href="{{ url('kategori/create') }}" class="btn btn-primary">Tambah</a>
        </div>
      </div>
    </div>
  </div>
@endsection