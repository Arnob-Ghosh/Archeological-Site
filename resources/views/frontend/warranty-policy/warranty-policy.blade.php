@extends('layouts.frontend.front-master')
@section('title', 'AMIGO - Warranty Policy')
@section('head')
<meta name="theme-color" content="#ffffff">
{{--
<link rel="stylesheet" href="assets/css/style.css"> --}}
<style>
    .description p {
        font-weight: 500 !important;
        color: black
    }
</style>

@endsection
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('frontend/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title"> Warranty Policy </h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page"> Warranty Policy</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div class="page-content">
        {{-- <div id="map" class="mb-5"></div><!-- End #map --> --}}
        <div class="container">
            <div class="row">
                <div class="col-12 text-center description">
                    @foreach ($warranty_policy as $item)
                    {!!$item->description !!}
                    @endforeach
                </div>
            </div>



        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
