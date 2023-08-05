@extends('layoutUser.main')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
@if (count($resep->resepGambar) > 0)
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('storage/'.$resep->resepGambar[0]->nama) }});">
@else
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
@endif
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>Recipe</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<div class="receipe-post-area section-padding-80">
    <!-- Receipe Slider -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="receipe-slider owl-carousel">
                    @foreach ($resep->resepGambar as $gambar)
                        @if ($gambar)
                            <img src="{{ asset('storage/'.$gambar->nama) }}" style="height: 424px;" alt="">
                        @else
                            <img src="{{ asset('templete/img/bg-img/r1.jpg') }}" alt="">
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Receipe Content Area -->
    <div class="receipe-content-area">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="receipe-headline my-5">
                        <span>{{ $resep->created_at->format('d F Y') }}</span>
                        <h2>{{ $resep->judul }}</h2>
                        <p>{!! $resep->deskripsi !!}</p>
                        <div class="receipe-duration">
                            <h6>Waktu memasak {{ $resep->durasi }} menit</h6>
                            <h6>Resep ini untuk {{ $resep->porsi }} porsi</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="single-preparation-step d-flex">
                        <h3>Langkah - Langkah untuk membuat</h3>
                    </div>
                    @php
                        $no = 1
                    @endphp
                    @forelse ($resep->langkahMembuat as $tutor)
                        <!-- Single Preparation Step -->
                        <div class="single-preparation-step d-flex">
                            <h4>{{ $no++ }}</h4>
                            <p>{!! $tutor->keterangan !!}</p>
                        </div>
                    @empty
                        <div class="single-preparation-step d-flex">
                            <p>not record</p>
                        </div>
                    @endforelse
                </div>

                <!-- Ingredients -->
                <div class="col-12 col-lg-4">
                    <div class="ingredients">
                        <h4>Bahan - Bahan</h4>

                        @forelse ($resep->bahanResep as $bahan)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck{{ $no }}" name="bahan{{ $no }}">
                                <label class="custom-control-label" for="customCheck{{ $no }}">
                                    {!! $bahan->keterangan !!}
                                </label>
                                @php
                                    $no++;
                                @endphp
                            </div>
                        @empty
                            <div class="custom-control custom-checkbox">
                                <p>not record</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-left">
                        <h3>Leave a comment</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn delicious-btn mt-30" type="submit">Post Comments</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection