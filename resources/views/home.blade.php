@extends('layoutUser.main')

@section('content')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            @if ($latestResep->resepGambar)
                <div class="single-hero-slide bg-img" style="background-image: url({{ asset('storage/'.$latestResep->resepGambar[0]->nama) }});">
            @else
                <div class="single-hero-slide bg-img" style="background-image: url({{ asset('templete/img/bg-img/bg1.jpg') }});">
            @endif
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="300ms">{{ $latestResep->judul }}</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">{{ $latestResep->created_at->format('d F Y') }}</p>
                                <a href="/resep-makanan-detail/{{ $latestResep->slug }}" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms" style="animation-delay: 1000ms; padding-top: 15px;">Lanjut Membaca</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            @if ($latestArtikel->gambar)
                <div class="single-hero-slide bg-img" style="background-image: url({{ asset('storage/'.$latestArtikel->gambar) }});">
            @else
                <div class="single-hero-slide bg-img" style="background-image: url({{ asset('templete/img/bg-img/bg1.jpg') }});">
            @endif
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="300ms">{{ $latestArtikel->judul }}</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">{{ $latestArtikel->created_at->format('d F Y') }}</p>
                                <a href="/artikel-makanan-detail/{{ $latestArtikel->slug }}" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms" style="animation-delay: 1000ms; padding-top: 15px;">Lanjut Membaca</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area  section-padding-80-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Resep Terbaru</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Best Receipe Area -->
                @forelse ($resep as $resep)
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
                @empty
                    <h2 class="text-center">not record</h2>
                @endforelse 
            </div>            
        </div>
    </section>
    <!-- ##### Best Receipe Area End ##### -->

    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area  section-padding-80-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Artikel Terbaru</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Best Receipe Area -->
                @forelse ($artikel as $artikel)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-best-receipe-area mb-30">
                            @if ($artikel->gambar)
                                <img src="{{ asset('storage/'.$artikel->gambar) }}" alt="">
                            @else
                                <img src="{{ asset('templete/img/bg-img/r1.jpg') }}" alt="">
                            @endif
                            <div class="receipe-content">
                                <a href="/resep-makanan-detail/{{ $artikel->slug }}">
                                    <h5>{{ $artikel->judul }}</h5>
                                </a>
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

    <!-- ##### CTA Area Start ##### -->
    <section class="cta-area bg-img bg-overlay" style="background-image: url({{ asset('templete/img/bg-img/bg4.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content text-center">
                        <h2>Kata - Kata Mutiara</h2>
                        <p>Fusce nec ante vitae lacus aliquet vulputate. Donec scelerisque accumsan molestie. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed accumsan neque. Ut vulputate, lectus vel aliquam congue, risus leo elementum nibh</p>
                        <a href="/" class="btn delicious-btn" style="padding-top: 15px;">Go Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area  section-padding-80-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Telusuri berdasarkan yang kamu mau</h3>
                    </div>
                </div>
            </div>

            {{-- <li><a href="{{ url('resep-makanan/'. $ktg->slug) }}">{{ $ktg->nama }}</a></li>  --}}
            <div class="row">
                @foreach ($kategori as $ktg)
                <!-- Single Best Receipe Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-best-receipe-area mb-30">
                        <img src="{{ asset('templete/img/bg-img/r1.jpg') }}" alt="">
                        <div class="receipe-content">
                            <a href="{{ url('resep-makanan/'. $ktg->slug) }}">
                                <h5>{{ $ktg->nama }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Best Receipe Area End ##### -->

    <!-- ##### Quote Subscribe Area Start ##### -->
    <section class="quote-subscribe-adds section-padding-80-0 mt-5">
        <div class="container">
            <div class="row align-items-end">
                <!-- Quote -->
                <div class="col-12 col-lg-12">
                    <div class="quote-area text-center">
                        <span>"</span>
                        <h4>Tidak ada yang lebih baik daripada pulang ke keluarga dan makan makanan enak dan bersantai</h4>
                        <p>John Smith</p>
                        <div class="date-comments d-flex justify-content-between">
                            <div class="date">January 04, 2018</div>
                            {{-- <div class="comments">2 Comments</div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Quote Subscribe Area End ##### -->
@endsection