@extends('layoutUser.main')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
@if ($artikel->gambar)
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('storage/'.$artikel->gambar) }});">
@else
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
@endif
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>Artikel</h2>
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
                    <img src="{{ asset('storage/'.$artikel->gambar) }}" style="height: 424px;" alt="">
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
                        <span>{{ $artikel->created_at->format('d F Y') }}</span>
                        <h2>{{ $artikel->judul }}</h2>
                        <p>{!! $artikel->deskripsi !!}</p>
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