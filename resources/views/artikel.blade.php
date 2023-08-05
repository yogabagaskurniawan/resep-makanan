@extends('layoutUser.main')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('templete/img/bg-img/r1.jpg') }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center text-white">
                    <h3>Artikel Resep Makanan</h3>
                    <h5 class="mt-4">Yuk cari inspirasi dari bebagai sumber</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Best Receipe Area Start ##### -->
<section class="best-receipe-area  section-padding-80-0">
    <div class="container">
        <div class="row">
            <!-- Single Best Receipe Area -->
            @forelse ($artikel as $artikel)
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
            @empty
                <h2 class="text-center">not record</h2>
            @endforelse 
        </div>
    </div>
</section>
<!-- ##### Best Receipe Area End ##### -->
@endsection