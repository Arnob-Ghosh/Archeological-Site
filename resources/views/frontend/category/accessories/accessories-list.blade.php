@extends('layouts.frontend.front-master')
@section('title', 'AMIGO - Accessories')
@section('head')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/skins/skin-demo-3.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/demos/demo-3.css') }}">
<style>
    /* .owl-carousel-brand .item {
        margin-top: 3px;
        margin-bottom: 3px;
        margin-right: 3px;
        margin-left: 20px;
    }

    .owl-carousel-brand .item img {
        display: block;
        width: 100%;
        height: auto;
    }

    .owl-carousel-brand .item {
        margin-top: 3px;
        margin-bottom: 3px;
        margin-right: 3px;
        margin-left: 20px;
    } */

    /* .owl-carousel-brand {
                        margin-bottom: 8px;

                    } */
    @media only screen and (device-width : 768px) and (device-height:1024px) {
        .carousel-item>img {
            height: 600px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width : 1024px) and (device-height: 768px) {
        .carousel-item>img {
            height: 600px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width : 1280px) and (device-height: 1024px) {
        .carousel-item>img {
            height: 600px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width : 1280px) and (device-height: 800px) {
        .carousel-item>img {
            height: 600px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width : 1600px) and (device-height: 900px) {
        .carousel-item>img {
            height: 600px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :1280px) and (device-height:720px) {
        .carousel-item>img {
            height: 600px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :1440px) and (device-height:900px) {
        .carousel-item>img {
            height: 600px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :1536px) and (device-height:864px) {
        .carousel-item>img {
            height: 600px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :1920px) and (device-height:1080px) {
        .carousel-item>img {
            max-height: 850px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :1366px) and (device-height:768px) {
        .carousel-item>img {
            height: 570px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :2560px) and (device-height:1440px) {
        .carousel-item>img {
            height: 1100px !important;
            width: 100% !important;
        }
    }
    @media only screen and (device-width :2048px) and (device-height:1080px) {
        .carousel-item>img {
            height: 1100px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :3840px) and (device-height:2160px) {
        .carousel-item>img {
            height: 1100px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :4096px) and (device-height:2160px) {
        .carousel-item>img {
            height: 1100px !important;
            width: 100% !important;
        }
    }
    .brand-name a {
        color: rgb(0, 0, 0)
    }

    .brand-name a :hover,
    .brand-name a.show,
    .brand-name a :active {
        color: #39f !important;

        /* amigo:  #0069A7 */
        /* rgb(34, 34, 34)*/

    }

    .brands {
        display: flex;
        align-items: center;
        /* text-align: center !important; */
    }

    .owl-carousel-brand {
        display: flex !important;
        flex-direction: row;
        justify-content: center;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<main class="main">

    <div class="intro-section ">
        <div id="myCarousel" class="carousel slide">

            <!-- Indicators -->
            {{-- <ul class="carousel-indicators">
                <li class="item1 active" style="background-color:#39f;width:65px;"></li>
                <li class="item2" style="background-color:#39f;width:65px;"></li>
                <li class="item3" style="background-color:#39f;width:65px;"></li>
            </ul> --}}
            @php
            $j = 1;
            @endphp
            <!-- The slideshow -->
            <div class="carousel-inner carousel-item-img" id="carousel-item-img">
                @foreach ($sliders as $slider)
                <div class="carousel-item{{ $j == 1 ? ' active' : '' }} ">
                    <img src="{{ asset($slider->slider) }}" alt="Los Angeles">
                </div>
                {{ $j++ }}
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="javascript:void(0)">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="javascript:void(0)">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        {{--
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light owl-loaded owl-drag" data-toggle="owl"
            data-owl-options="{
                autoplay:true,
                autoplayTimeout:500,
                    &quot;dots&quot;: true,
                    &quot;nav&quot;: false,
                    &quot;responsive&quot;: {
                        &quot;1200&quot;: {
                            &quot;nav&quot;: true,
                            &quot;dots&quot;: false
                        }
                    }
                }">
            <!-- End .intro-slide -->

            <!-- End .intro-slide -->
            <div class="owl-stage-outer">
                <div class="owl-stage"
                    style="transform: translate3d(-2698px, 0px, 0px); transition: all 0s ease 0s; width: 8094px;">
                    @foreach ($sliders as $item)
                    <div class="owl-item active" style="width: 1349px;">
                        <div class="intro-slide" style="background-image: url({{ asset($item->slider) }});">
                            <div class="container intro-content">
                                <div class="row justify-content-end">
                                    <div class="col-auto col-sm-7 col-md-6 col-lg-5">

                                    </div><!-- End .col-lg-11 offset-lg-1 -->
                                </div><!-- End .row -->
                            </div><!-- End .intro-content -->
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                        class="icon-angle-left"></i></button><button type="button" role="presentation"
                    class="owl-next"><i class="icon-angle-right"></i></button></div>
            <div class="owl-dots disabled"></div>
        </div><!-- End .intro-slider owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader --> --}}

        {{-- <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-slider owl-carousel owl-theme  owl-light owl-loaded owl-drag " data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "autoplay":true,
                                    "autoplayTimeout":500,
                            "responsive": {
                                "0": {
                                    "nav": false,
                                    "dots": true,
                                    "animateOut": fadeOut,
                                    "mouseDrag": false,

                                },
                                "768": {
                                    "nav": false,
                                    "dots": true,
                                    "animateOut": fadeOut,
                                    "mouseDrag": false,

                                }
                            }
                        }'>
                        <!-- End .intro-slide -->

                        <!-- End .intro-slide -->
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-2698px, 0px, 0px); transition: all 0s ease 0s; width: 8094px;">
                                @foreach ($sliders as $item)
                                <div class="owl-item cloned " style="width: 1349px;">

                                    <div class="intro-slide owl-height"
                                        style="height:450px; background-image: url({{ asset($item->slider) }});">
                                        <div class="container intro-content">

                                        </div><!-- End .intro-content -->
                                    </div>


                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                    class="icon-angle-left"></i></button><button type="button" role="presentation"
                                class="owl-next"><i class="icon-angle-right"></i></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div><!-- End .col-lg-8 -->

            </div><!-- End .row -->
        </div><!-- End .container --> --}}
    </div><!-- End .intro-section -->



    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2" id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Accessories</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div class="page-content" style=" padding-bottom: 0.2rem; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <ul class="nav nav-pills justify-content-center">

                        {{-- <h3 class="widget-title">

                            All Brands

                        </h3><!-- End .widget-title --> --}}

                    </ul>

                    <div class="owl-carousel owl-loaded owl-carousel-brand brands">

                        <div class="item text-center">
                            <ul class="nav nav-pills justify-content-center" role="tablist">
                                <li class="nav-item brand-name">
                                    {{-- <a class="all-product nav-link " href="javascript:void(0)" id="all-product"
                                        aria-selected="true">All </a> --}}
                                    <a class="all-product  " href="javascript:void(0)" class="brand-sort">
                                        <h3 aria-selected=" true" id="all-product">All </h3>
                                    </a>
                                </li>
                            </ul>

                        </div>
                        @foreach ($brands as $brand)
                        <div class="item brand-name">
                            <a href="javascript:void(0)" class="brand-sort" data-value="{{ $brand->id }}">
                                <h3 aria-selected="true">{{ $brand->brand_name }} </h3>
                            </a>
                        </div>
                        @endforeach

                    </div>
                    <div class=" mb-1"></div>

                    {{-- <div class="products mb-3yy " id="product-loaded">
                        <div class="breadcrumb-nav"></div>
                        <div class="row justify-content-center">
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($data as $item)
                            <div class="col-8 col-md-4 col-lg-4 ">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">


                                        <a href="{{route('frontend.categry.feature.phone.details',$item->id)}}"
                                            id="img-div-{{ $i }}" class="item-hover">


                                            <img src="{{ asset($item->feature_phone[0]->back_image) }}"
                                                alt="Product image" class="record" id="record{{ $i }}" style=" position: absolute;
                                                left: 50px;
                                                bottom: 0px;
                                                z-index: 1;
                                               ">



                                            <img src="{{ asset($item->feature_phone[0]->front_image) }}"
                                                alt="Product image" class="sleeve" id="sleeve{{ $i }}" style=" position: relative;
                                                left: 80px;
                                                bottom: 0px;
                                                z-index: 1;
                                              ">

                                        </a>



                                    </figure><!-- End .product-media -->

                                    <div class="product-body">

                                        <h1 class="product-title" style="font-weight: 600; margin-bottom:5px;"><a
                                                href="{{route('frontend.categry.feature.phone.details',$item->id)}}">{{
                                                $item->model_name }}</a>
                                        </h1>


                                        <div class="product-nav product-nav-thumbs item-hover-variant-image"
                                            id="variant-image-{{ $i }}">
                                            @foreach ($item->feature_phone as $item)
                                            <a href="" id="ab-{{ $i }}" class="active">

                                                <img src="{{ asset($item->colour_thumbnail) }}" alt="product desc"
                                                    style="width: 40px;height:40px;">
                                            </a>
                                            @endforeach

                                        </div><!-- End .product-nav -->


                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 -->
                            @php
                            $i++;
                            @endphp
                            @endforeach


                        </div><!-- End .row -->
                    </div><!-- End .products --> --}}

                    <div class="products mb-3" id="product-loaded">
                        <div class="row">
                            @foreach ($data as $item)

                            <div class="col-6 col-md-4 col-xl-4">
                                <div class="product">
                                    <figure class="product-media">
                                        {{-- <span class="product-label label-new">New</span> --}}
                                        <a href="{{route('frontend.accessories.details',$item->id)}}">
                                            <img src="{{asset($item->default_image)}}" alt="Product image" class="product-image">
                                        </a>

                                    </figure><!-- End .product-media -->

                                    <div class="product-body " style="text-align: center!important">
                                        <div class="product-cat">
                                            {{-- @foreach ($item->category as $cat) --}}
                                            <a href="{{route('frontend.accessories.details',$item->id)}}">{{$item['category']['category_name']}}</a>
                                            {{-- @endforeach --}}

                                        </div><!-- End .product-cat -->
                                        <h1 class="product-title" style="font-weight: 600;font-size: 1.1em; margin-bottom:5px;color:black"><a href="{{route('frontend.accessories.details',$item->id)}}" > {{$item->product_name}}</a></h1><!-- End .product-title -->

                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-xl-3 -->
                            @endforeach

                            {{-- <div class="col-6 col-md-4 col-xl-4">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="{{asset('frontend/assets/images/demos/demo-13/products/product-8.jpg')}}" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body"  style="text-align: center!important">
                                        <div class="product-cat">
                                            <a href="#">Audio</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $899.99
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 4 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-dots">
                                            <a href="#" class="active" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                            <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-xl-3 --> --}}


                        </div><!-- End .row -->
                    </div><!-- End .products -->

                    <div class="products mb-3 ">
                        <div class="row" id="category-product-append">

                        </div><!-- End .row -->
                    </div><!-- End .products -->

                    <div class="products mb-3 ">
                        <div class="row" id="brand-product-append">

                        </div><!-- End .row -->
                    </div><!-- End .products -->


                    {{--
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                                    aria-disabled="true">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item-total">of 6</li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav> --}}
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">


                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                    aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        <div class="filter-item">
                                            @php $i = 1; @endphp
                                            @foreach ($category as $item)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="checkbox custom-control-input"
                                                    id="category-{{ $i }}" name="checkbox" value="{{ $item->category_name }}">
                                                <label class="custom-control-label" for="category-{{ $i }}">{{
                                                    $item->category_name }}</label>
                                            </div><!-- End .custom-checkbox -->
                                            @php
                                            $i++;
                                            @endphp
                                            @endforeach
                                            {{-- <span class="item-count">3</span> --}}
                                        </div><!-- End .filter-item -->



                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                                    aria-controls="widget-2">
                                    Display
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            @php
                                            $j = 1;
                                            @endphp
                                            @foreach ($display_size as $item)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="checkbox custom-control-input"
                                                    name="checkbox" value="{{ $item->display_size }}"
                                                    id="size-{{ $j }}">
                                                <label class="custom-control-label" for="size-{{ $j }}">{{
                                                    $item->display_size }}</label>
                                            </div><!-- End .custom-checkbox -->
                                            @php
                                            $j++;
                                            @endphp
                                            @endforeach

                                        </div><!-- End .filter-item -->

                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->

                        </div><!-- End .widget --> --}}



                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->

</main><!-- End .main -->


@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/frontend/accessories-list.js') }}"></script>

<script>
    $(document).ready(function() {
            // Activate Carousel
            $("#myCarousel").carousel();

            // Enable Carousel Indicators
            $(".item1").click(function() {
                $("#myCarousel").carousel(0);
            });
            $(".item2").click(function() {
                $("#myCarousel").carousel(1);
            });
            $(".item3").click(function() {
                $("#myCarousel").carousel(2);
            });

            // Enable Carousel Controls
            $(".carousel-control-prev").click(function() {
                $("#myCarousel").carousel("prev");
            });
            $(".carousel-control-next").click(function() {
                $("#myCarousel").carousel("next");
            });

            $(".owl-carousel-brand").owlCarousel({

                autoPlay: 3000,
                items: 3,
                margin:15,
                 itemsDesktop : [1199,5],
                 itemsDesktopSmall : [979,5],
                //  center: true,
                //  nav:true,
                //  dots: true,
                loop: false,
                responsive: {
                    0: {
                        items: 2,
                        margin:15,
                    },
                    480: {
                        items: 3,
                        margin:15,
                    },
                    600: {
                        items: 8,
                        margin:20,
                        //  loop:true,
                    }
                }






            });

        });






</script>

@endsection
