@extends('layoutUser.main')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('templete/img/bg-img/breadcumb4.jpg') }} );">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcumb-text text-center">
                    <h2>Contact</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Contact Information Area Start ##### -->
<div class="contact-information-area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="logo mb-80">
                    <img src="{{ asset('templete/img/core-img/logo.png') }}" alt="">
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Contact Text -->
            <div class="col-12 col-lg-8">
                <div class="contact-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec varius dui. Suspendisse potenti. Vestibulum ac pellentesque tortor. Aenean congue sed metus in iaculis. Cras a tortor enim. Phasellus posuere vestibulum ipsum, eget lobortis purus.</p>
                    <p>Orci varius natoque penatibus et magnis dis ac pellentesque tortor. Aenean congue parturient montes, nascetur ridiculus mus.</p>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <!-- Single Contact Information -->
                <div class="single-contact-information mb-30">
                    <h6>Address:</h6>
                    <p>481 Creekside Lane Avila <br>Beach, CA 93424</p>
                </div>
                <!-- Single Contact Information -->
                <div class="single-contact-information mb-30">
                    <h6>Phone:</h6>
                    <p>+53 345 7953 32453 <br>+53 345 7557 822112</p>
                </div>
                <!-- Single Contact Information -->
                <div class="single-contact-information mb-30">
                    <h6>Email:</h6>
                    <p>yourmail@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Contact Information Area End ##### -->

<!-- ##### Contact Form Area Start ##### -->
<div class="contact-area section-padding-0-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>Contact Me</h3>
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
                            <div class="col-12 text-center">
                                <button class="btn delicious-btn mt-30" type="submit">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Contact Form Area End ##### -->
@endsection