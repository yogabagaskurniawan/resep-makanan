@extends('admin.layout.main')

@section('content')
<div class="row">
    <div class="col-lg-12 mb-5">
      @include('admin.resep.bahanResep.formBahan')
    </div>
    <div class="col-lg-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h3>Bahan - bahan dari resep {{ $resep->judul }}</h3>
        </div>
        <div class="card-body">
          @if (session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
          @endif
          <table class="table table-bordered table-stripped">
            <thead>
              <th style="width:10%">#</th>
              <th>Keterangan</th>
              <th style="width:30%">Action</th>
            </thead>
            <tbody>
              @forelse ($resep->bahanResep as $bhnResep)
                <tr>    
                  <td>{{ $bhnResep->id }}</td>
                  <td>{{ $bhnResep->keterangan }}</td>
                  <td>
                    <a href="{{ url('resep/bahan/'. $bhnResep->id .'/edit') }}" class="btn btn-warning btn-sm">edit</a>
                    <form action="{{ url('resep/bahan/'. $bhnResep->id) }}" method="POST" class="delete" style="display:inline-block">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                  </td>                                        
                </tr>
              @empty
                <tr>
                  <td colspan="5">No records found</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection