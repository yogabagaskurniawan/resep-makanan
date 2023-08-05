@extends('layoutUser.main')

@section('content')
    {{-- @forelse ($resep as $resep)
        <h1>{{ $resep->judul }}</h1>
    @empty
        not record
    @endforelse --}}
    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area  section-padding-80-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>{{ $kategori1->nama }}</h3>
                        <h5 class="mt-4">Yuk mulai masak dengan berbagai olahan resep</h5>
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
@endsection