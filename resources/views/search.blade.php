@extends('layoutUser.main')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('templete/img/bg-img/r1.jpg') }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center text-white">
                    <h3>Hasil Pencarian untuk "{{ $keyword }}"</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->


<!-- Search Results Wrapper -->
<div class="search-results">
    {{-- <h2>Hasil Pencarian untuk "{{ $keyword }}"</h2> --}}

    <!-- Tampilkan hasil pencarian untuk model Resep -->
    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area  section-padding-80-0" style="padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Resep</h3>
                    </div>
                </div>
            </div>
            
    @if ($resepResults->count() > 0)
                <div class="row">
                    <!-- Single Best Receipe Area -->
                    @foreach ($resepResults as $resep)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-best-receipe-area mb-30">
                            @if (count($resep->resepGambar) > 0)
                                <img src="{{ asset('storage/'.$resep->resepGambar[0]->nama) }}" alt="">
                            @else
                                <img src="{{ asset('templete/img/bg-img/r1.jpg') }}" alt="">
                            @endif
                            <div class="receipe-content">
                                <a href="/resep-makanan-detail/{{ $resep->slug }}">
                                    <h5>{{ $resep->judul }}</h5>
                                </a>
                                <p>Hanya memerlukan waktu {{ $resep->durasi }} menit untuk membuat</p>
                                <p>{{ $resep->created_at->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div>
            </div>
        </section>
        <!-- ##### Best Receipe Area End ##### -->
    @else
        <p>Tidak ada hasil pencarian untuk Resep.</p>
    @endif

    <!-- Tampilkan hasil pencarian untuk model Artikel -->
    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area  section-padding-80-0" style="padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                            <h3>Artikel</h3>
                        </div>
                    </div>
                </div>
    @if ($artikelResults->count() > 0)
                <div class="row">
                    <!-- Single Best Receipe Area -->
                    @foreach ($artikelResults as $artikel)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-best-receipe-area mb-30">
                            @if ($artikel)
                                <img src="{{ asset('storage/'.$artikel->gambar) }}" alt="">
                            @else
                                <img src="{{ asset('templete/img/bg-img/r1.jpg') }}" alt="">
                            @endif
                            <div class="receipe-content">
                                <a href="/artikel-makanan-detail/{{ $artikel->slug }}">
                                    <h5>{{ $artikel->judul }}</h5>
                                </a>
                                {{-- <p>Hanya memerlukan waktu {{ $artikel->durasi }} menit untuk membuat</p> --}}
                                <p>{{ $artikel->created_at->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ##### Best Receipe Area End ##### -->
    @else
        <p>Tidak ada hasil pencarian untuk Artikel.</p>
    @endif
</div>

@endsection