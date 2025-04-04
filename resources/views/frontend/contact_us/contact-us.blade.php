@extends('layouts.frontend.front-master')
@section('title', ' Contact Us')
@section('head')
<meta name="theme-color" content="#ffffff">
{{--
<link rel="stylesheet" href="assets/css/style.css"> --}}
{{-- <style>
    #record {
        /* position: absolute; */
        left: 0px;
        bottom: 0px;
        z-index: 1;
        padding-left: 20px;
    }

    #sleeve {
        /* position: absolute; */
        left: 0px;
        bottom: 0px;
        z-index: 50;

    }
</style> --}}
<style>.google-map {
    padding-bottom: 30%;
    position: relative;

  }

  .google-map iframe {
    height: 85%;
    width: 100%;
    left: 0;
    top: 0;
    position: absolute;

  }</style>

@endsection
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('frontend/assets/images/abc.pg')">
        <div class="container">
            <h1 class="page-title">Contact us </h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div class="page-content">
        {{-- <div id="map" class="mb-5"></div><!-- End #map --> --}}
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <i class="fas fa-map-marker-alt fa-3x"></i>


                        <h5 class="pt-2" style="">ARCHAEOLOGICAL MUSEUM</h5>

                        <h6>Mainamati Archaeological Museum
                            department of Archaeology
                            Regional Directorate Office
                            chattagram and Sylhet Division,Cumilla 3503. </h6>
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <i class="fas fa-envelope fa-3x"></i>
                        <h6 class="pt-2">rd_chittagong@archaeology.gov.bd</h6>
                        <h6 class="">mumainamati@gmail.com</h6>
                        <h6 class="">Phone: +88 02 33 44 37089 </h6>
                        <h6>mobile no. +88 01718 787944</h6>
                        {{-- <div><a href="mailto:#">info@Molla.com</a></div>
                        <div><a href="tel:#">+1 987-876-6543</a>, <a href="tel:#">+1 987-976-1234</a></div> --}}
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <a href="#"><i
                                class="fab fa-facebook-messenger fa-3x"></i> </a>
                        <a href="#">
                            <h6 class="pt-2">Messenger</h6>
                        </a>


                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->
            </div><!-- End .row -->

            <hr class="mt-3 mb-5 mt-md-1">
            <div class="touch-container row justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="text-center">
                        <h2 class="title mb-1">Get In Touch</h2><!-- End .title mb-2 -->
                        <p class="lead text-primary">
                            @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        </p><!-- End .lead text-primary -->
                        {{-- <p class="mb-3">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu
                            pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus
                            sed, urna.</p> --}}
                    </div><!-- End .text-center -->

                    <form method="POST" class="contact-form mb-2">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div><!-- End .col-sm-4 -->

                            <div class="col-sm-4">
                                <label for="email" class="sr-only">Emal</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email *"
                                    required>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-sm-4">
                                <label for="phone" class="sr-only">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                            </div><!-- End .col-sm-4 -->
                        </div><!-- End .row -->

                        <label for="subject" class="sr-only">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">

                        <label for="message" class="sr-only">Message</label>
                        <textarea class="form-control" cols="30" rows="4" id="message" name="message" required
                            placeholder="Message *"></textarea>

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                <span>SUBMIT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </div><!-- End .text-center -->
                    </form><!-- End .contact-form -->



                </div><!-- End .col-md-9 col-lg-7 -->
            </div><!-- End .row -->
            <div class="google-map container-fluid" style="margin-left:0px; margin-right:0px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3661.047005441291!2d91.13542297429835!3d23.4226691012812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37547f5b7615806b%3A0xb72e6331186391f9!2z4KaG4Kae4KeN4Kaa4Kay4Ka_4KaVIOCmquCmsOCmv-CmmuCmvuCmsuCmleCnh-CmsCDgppXgpr7gprDgp43gpq_gpr7gprLgp58g4Kaq4KeN4Kaw4Kak4KeN4Kao4Kak4Kak4KeN4Kak4KeN4KasIOCmheCmp-Cmv-CmpuCmquCnjeCmpOCmsA!5e0!3m2!1sen!2sbd!4v1687783360782!5m2!1sen!2sbd"  width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>

        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
