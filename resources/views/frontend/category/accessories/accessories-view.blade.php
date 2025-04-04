@extends('layouts.frontend.front-master')
@section('title', 'AMIGO - Accessory Details')
@section('head')

<link rel="stylesheet" href="{{ asset('dataTable/datatables.min.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('dataTable/Buttons-2.2.2/css/buttons.bootstrap5.min.css') }}"> -->
{{--
<link type="text/css" rel="stylesheet" href="{{ asset('js/magiczoomplus/magiczoomplus.css') }}" />
<script type="text/javascript" src="{{ asset('js/magiczoomplus/magiczoomplus.js') }}"></script> --}}
<style>
    /* table {
        border-collapse: collapse;
        width: 100%;
    } */

    /* td:first-child {
        background-color: lime;

    } */

    /* td:first-child {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    } */
    .linetd {

        margin-bottom: 8px;
        border-collapse: collapse;
        border-bottom: 1px solid #ddd;
        padding-bottom: 50px;


    }

    h5,
    .h5 {
        font-size: 1.6rem;
        font-weight: 900 !important;
        color: black
    }

    .amigo-font {
        font-weight: 600 !important;
        color: black
    }

    #product-desc-tab p {
        font-weight: 600 !important;
        color: black
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')


<main class="main">

    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/accessories') }}">Accessories</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div>


        <div class="product-details-tab product-details-extended">
            <div class="container">
                <!-- details over view -->
                <div class="product-details-top mb-2">
                    <div class="row">
                        @php
                        $box_image;
                        @endphp

                        @foreach ($data as $item)
                        <div class="col-md-6">
                            <div class="product-details product-details-centered"style="margin-bottom: 0rem!important;" >

                                <figure class="product-main-image">


                                    <img id="product-zoom" src="{{ asset($item->product_image) }}"
                                        data-zoom-image="{{asset($item->product_image)}}"
                                        alt="product image">
                                    {{-- {{ asset($item->feature_phone[0]->over_view_image) }} --}}

                                </figure><!-- End .product-main-image -->



                            </div><!-- End .product-gallery -->
                            <h3 hidden> {{ $description = $item->description }} </h3>
                            @php
                            $i = 1;
                            @endphp

                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details" style="margin-bottom: 0rem!important;">

                                <h3 style="margin-bottom: 2rem;">{{ $item->product_name }}</h3>
                                <!-- End .product-title -->





                                <div class="product-details-action" alt="Responsive image">
                                    <img src="{{ asset($item->highlighted_spec) }}" alt="product desc"
                                        style="max-width : 100%!important;height:100% !important">

                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer" style="padding-bottom: 0.0rem!important;">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        {{-- @foreach ($item->category as $cat) --}}
                                        <a href="#">{{$item['category']['category_name']}}</a>
                                        {{-- @endforeach --}}

                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                                class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                                class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                                class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                                class="icon-pinterest"></i></a>
                                    </div>
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->

                        </div><!-- End .col-md-6 -->
                    </div>

                </div>
                @endforeach
                <!-- End details over view -->
                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-left" role="tablist" style="border-bottom:0.1rem solid #ebebeb;border-top:0.0em solid #ebebeb">
                        <li class="nav-item">
                            <a style="font-weight: 600 !important;" class="nav-link active" id="product-desc-link"
                                class="amigo-font" data-toggle="tab" href="#product-desc-tab" role="tab"
                                aria-controls="product-desc-tab" aria-selected="true">
                                Product Specification
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a style="font-weight: 600 !important;" class="nav-link" id="product-shipping-link"
                                data-toggle="tab" href="#product-shipping-tab" role="tab"
                                aria-controls="product-shipping-tab" aria-selected="false">In The Box</a>
                        </li> --}}

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link" style="font-weight: 600 !important;color:black">
                            <div class="product-desc-content">
                                <div class="mt-2"></div>

                                {!!$description !!}
                                {{-- @foreach ($descriptions as $description)
                                <P>{{$description->}}</P>
                                @endforeach --}}

                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                            aria-labelledby="product-shipping-link">

                            <div class="product-desc-content">

                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                            aria-labelledby="product-review-link">
                            <div class="reviews">
                                <h3>Reviews (2)</h3>
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">Samanta J.</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">6 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Good, perfect size</h4>

                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum
                                                    dolores assumenda asperiores facilis porro reprehenderit animi culpa
                                                    atque blanditiis commodi perspiciatis doloremque, possimus,
                                                    explicabo, autem fugit beatae quae voluptas!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->

                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">John Doe</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">5 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Very good</h4>

                                            <div class="review-content">
                                                <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum
                                                    blanditiis laudantium iste amet. Cum non voluptate eos enim, ab
                                                    cumque nam, modi, quas iure illum repellendus, blanditiis
                                                    perspiciatis beatae!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->

                </div>

            </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
