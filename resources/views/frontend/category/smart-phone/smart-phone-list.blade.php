@extends('layouts.frontend.front-master')
@section('title', 'AMIGO - Smart Phones')
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
            max-height: 880px !important;
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

    </div><!-- End .intro-section -->



    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2" id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Smart Phone</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div class="page-content">
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

                    <div class="products mb-3yy " id="product-loaded">
                        <div class="breadcrumb-nav"></div>
                        <div class="row justify-content-center">
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($data as $item)
                            <div class="col-8 col-md-4 col-lg-4 ">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">


                                        <a href="{{route('frontend.categry.smart.phone.details',$item->id)}}"
                                            id="img-div-{{ $i }}" class="item-hover">

                                            {{-- back Image --}}
                                            @if (!empty($item->smart_phone[0]))
                                            <img src="{{ asset($item->smart_phone[0]->back_image) }}"
                                                alt="Product image" class="record" id="record{{ $i }}" style=" position: absolute;
                                                left: 50px;
                                                bottom: 0px;
                                                z-index: 1;
                                               ">


                                            {{-- front Image --}}
                                            <img src="{{ asset($item->smart_phone[0]->front_image) }}"
                                                alt="Product image" class="sleeve" id="sleeve{{ $i }}" style=" position: relative;
                                                left: 80px;
                                                bottom: 0px;
                                                z-index: 1;
                                              ">
                                             @endif

                                        </a>


                                        {{-- <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                title="Add to wishlist"></a>
                                        </div><!-- End .product-action --> --}}

                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        {{-- <div class="product-cat">
                                            <a href="#">Dresses</a>
                                        </div><!-- End .product-cat --> --}}
                                        <h1 class="product-title" style="font-weight: 600; margin-bottom:5px;"><a
                                                href="{{route('frontend.categry.smart.phone.details',$item->id)}}">{{
                                                $item->model_name }}</a>
                                        </h1>
                                        <!-- End .product-title -->
                                        {{-- <div class="product-price">
                                            $84.00
                                        </div> --}}

                                        <div class="product-nav product-nav-thumbs item-hover-variant-image"
                                            id="variant-image-{{ $i }}">
                                            @foreach ($item->smart_phone as $item)

                                            <a href="javascript:void(0)" id="ab-{{ $i }}" class="append-active">
                                                <img src="{{ asset($item->colour_thumbnail) }}" alt="product desc" style="width: 40px;height:40px;">
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
                    </div><!-- End .products -->

                    <div class="products mb-3 ">
                        <div class="row justify-content-center" id="product-append">

                        </div><!-- End .row -->
                    </div><!-- End .products -->

                    <div class="products mb-3 ">
                        <div class="row justify-content-center" id="brand-product-append">

                        </div><!-- End .row -->
                    </div><!-- End .products -->

                    <div class="products mb-3 ">
                        <div class="row justify-content-center" id="display-product-append">

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
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            {{-- <a href="#" class="sidebar-filter-clear">Clean All</a> --}}
                        </div><!-- End .widget widget-clean -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                    aria-controls="widget-1">
                                    Camera
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        <div class="filter-item">
                                            @php $i = 1; @endphp
                                            @foreach ($camera as $item)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="checkbox custom-control-input"
                                                    id="camera-{{ $i }}" name="checkbox" value="{{ $item->camera }}">
                                                <label class="custom-control-label" for="camera-{{ $i }}">{{
                                                    $item->camera }}</label>
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

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                                    aria-controls="widget-2">
                                    Display
                                </a>
                            </h3><!-- End .widget-title -->


                            <!--display select-->
                            {{-- <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            @php
                                            $j = 1;
                                            @endphp
                                            @foreach ($display_size as $item)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="display_size custom-control-input"
                                                    name="display_size" value="{{ $item->display_size }}"
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
                            </div><!-- End .collapse --> --}}
                            <!--End display select-->

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

                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                                    aria-controls="widget-3">
                                    Battery
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-3">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            @php
                                            $k = 1;
                                            @endphp
                                            @foreach ($battery as $item)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="checkbox custom-control-input"
                                                    name="checkbox" value="{{ $item->battery }}" id="battery-{{ $k }}">
                                                <label class="custom-control-label" for="battery-{{ $k }}">{{
                                                    $item->battery
                                                    }}</label>
                                            </div><!-- End .custom-checkbox -->
                                            @php
                                            $k++;
                                            @endphp
                                            @endforeach

                                        </div><!-- End .filter-item -->

                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true"
                                    aria-controls="widget-4">
                                    Network
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            @php
                                            $k = 1;
                                            @endphp
                                            @foreach ($network as $item)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="checkbox custom-control-input"
                                                    name="checkbox" value="{{ $item->network_parameter }}"
                                                    id="network-{{ $k }}">
                                                <label class="custom-control-label" for="network-{{ $k }}">{{
                                                    $item->network_parameter
                                                    }}</label>
                                            </div><!-- End .custom-checkbox -->
                                            @php
                                            $k++;
                                            @endphp
                                            @endforeach

                                        </div><!-- End .filter-item -->

                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->

                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->

</main><!-- End .main -->


@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/frontend/smart-phone-list.js') }}"></script>

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





        //start
        // $(document).on('click', '.display_size', function() {
        //     let displayList = {};
        //     let result = new Array();
        //     $('input:checkbox[name=display_size]:checked').each(function() {
        //         // alert($(this).val())
        //         result.push($(this).val());
        //         //     displayList= $(this).val();
        //         //    result.push(displayList);


        //     });
        //     // console.log(result)
        //     if (result.length > 0) {
        //         //   console.log(result)
        //         submitToServer(result)
        //     } else {
        //         // $('#display-product-append').append('<div class="col-6 col-md-4 col-lg-4 ">\
        //         // <h3>No Product Found</h3>\
        //         // </div>\
        //         // ');
        //         $('#product-loaded').show();
        //         $('#display-product-append').hide();
        //         // alert('no data selected')
        //     }

        // });

        // function submitToServer(jsonData) {

        //     console.log(jsonData)

        //     $.ajax({
        //         //     type: "post",
        //         //     contentType: "application/json",
        //         //     url: "/smart-phone/get-device-by-display",
        //         //     data: JSON.stringify(jsonData),
        //         //     dataType: "json",
        //         //    contentType: "application/json",
        //         type: "get",
        //         contentType: "application/json",
        //         url: "/smart-phone/get-device-by-display/" + jsonData,
        //         // data: JSON.stringify(jsonData),
        //         dataType: "json",
        //         contentType: "application/json",
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function(response) {
        //             // alert(response.message);
        //             // $.notify(response.message, {
        //             //     className: 'success',
        //             //     position: 'bottom right'
        //             // });
        //             // $(location).attr('href','/pay-benefit-create');
        //             console.log('ok')
        //             $('#product-loaded').hide();
        //             $('#product-append').hide();
        //             $('#brand-product-append').hide();
        //             $('#display-product-append').show();
        //             $('#display-product-append').empty();
        //             // $('#brand-product-append').empty();
        //             console.log(response.status);
        //             var i = 1;
        //             var j = 0;

        //             var front_image;
        //             var back_image;
        //             var main_model_id;
        //             var variant_model_id;


        //             $.each(response.data, function(key, item) {
        //                 main_model_id = item.id;
        //                 console.log('main_model_id ' + main_model_id)

        //                 console.log("j ; " + j)
        //                 console.log(item.smart_phone[0].front_image)

        //                 $('#display-product-append').append('<div class="col-6 col-md-4 col-lg-4 ">\
        //         <div class="product product-7 text-center">\
        //             <figure class="product-media">\
        //                 <a href="product.html" id="display-append-img-div-' + i + '" class="append-item-hover">\
        //                     <img src="' + item.smart_phone[0].back_image +
        //                     '" alt="Product image" class="record" id="display-append-record' + i + '" style=" position: relative;left: 40px; bottom: 0px;z-index: 1;">\
        //                     <img src="' + item.smart_phone[0].front_image +
        //                     '" alt="Product image" class="sleeve" id="display-append-sleeve' + i + '" style=" position: absolute;left: 0px;bottom: 0px;z-index: 1;">\
        //                 </a>\
        //                 <div class="product-action-vertical">\
        //                     <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>\
        //                 </div>\
        //             </figure>\
        //             <div class="product-body">\
        //                 <h2 class="product-title"><a href="product.html">' + item.model_name +
        //                     '</a></h2>\
        //                 <div class="product-nav product-nav-thumbs display-append-item-hover-variant-image" id="display-append-variant-image-' +
        //                     i + '">\
        //                 </div>\
        //             </div>\
        //         </div>\
        //     </div>\
        //      ');
        //                 $.each(item.smart_phone, function(index, data) {
        //                     console.log('front_image ' + data.smart_phone)
        //                     console.log('\n')
        //                     $('#display-append-variant-image-' + i + '').append(
        //                         '<a href="#" id="display-append-ab-' + i + '" class="append-active">\
        //         <img src="' + data.front_image + '" alt="product desc" style="width: 40px;height:40px;">\
        //     </a>\
        //         ');
        //                 });
        //                 j++;
        //                 i++;

        //             });


        //         }
        //     });
        // }

        // $(document).on('mouseover', '.display-append-item-hover-variant-image a', function() {

        //     var id_str = $(this).attr('id');
        //     var id = id_str.replace('display-append-ab-', '');

        //     var image = $(this).find('img').attr('src')
        //     var first_image = image.replace('uploads/product/smartphone/variant/', '');
        //     //  alert(first_image)

        //     $.ajax({
        //         type: "GET",
        //         url: "get-variant-images/" + first_image,
        //         success: function(response) {
        //             if (response.status == 200) {

        //                 $.each(response.data, function(key, item) {

        //                     var front_image = '/' + item.front_image
        //                     var back_image = '/' + item.back_image

        //                     $('#display-append-record' + id).attr('src', back_image);
        //                     $('#display-append-sleeve' + id).attr('src', front_image);

        //                 });


        //             }
        //         },
        //     });



        // });


        //end

        // function checkDisplayCheckboxes(checkbox_id) {
        //     let result = new Array();
        //     $('#' + checkbox_id+':checked').each(function(){
        //         result.push($(this).val());
        //         console.log(result)
        // });


        // }


        // $("input:checkbox[name=display_size]:checked").each(function(){
        //     alert('sd')
        //     result.push($(this).val());
        // });
</script>

@endsection
