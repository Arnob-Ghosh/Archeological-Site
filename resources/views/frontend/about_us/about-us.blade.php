@extends('layouts.frontend.front-master')
@section('title', 'About Us')
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
<style>
    #news_list:hover {
        transition: transform .1s;
        -ms-transform: scale(1.05);
        /* IE 9 */
        -webkit-transform: scale(1.05);
        /* Safari 3-8 */
        transform: scale(1.05);

    }

    .exp_slider img {
        width: 100%;
        max-height: 450px !important;
    }

    #exp_product_head h3 {
        font-weight: 500;
        line-height: 1.1;
        color: #333;
        /* letter-spacing: -0.02em; */
    }

    #news_dev h3 {
        font-weight: 500;
        line-height: 1.1;
        color: #333;

        /* letter-spacing: -0.02em; */
    }

    #brand_name h3 {
        font-weight: 500;
        line-height: 1.1;
        color: #333;
    }

    .news-toggle a:hover {
        color: #39f;
    }
    .image-cropper {

    height: 180px;
    width: 70%;
    position: relative;
    overflow: hidden;
    border-radius: 50%;
}

    /* .news-toggle a:hover,
    .news-toggle a:focus,
    .news-toggle.active a {
        color: #39f;
    } */




    /* .carousel-item-img img {
        width: 100% !important;
        max-height: 550px !important;
    } */
    /* @media all and (min-width: 768px) {
        .carousel-item-img img {
            width: 100% !important;
            max-height: 570px !important;
        }
    }

    @media all and (min-width: 480px) {
        .carousel-item-img img {
            width: 100% !important;
            max-height: 550px !important;
        }
    }

    @media all and (min-width: 1200px) {
        .carousel-item-img img {
            width: 100% !important;
            max-height: 700px !important;
        }
    } */


    /* .carousel-item-img img {
        width: 100%;
        max-height: 570px !important;
    } */

    /* last added */

    /* @media only screen and (max-width: 600px) {
        .carousel-item>img {
            height: 300px !important;
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 768px) {
        .carousel-item>img {
            height: 680px !important;
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 900px) {
        .carousel-item>img {
            height: 950px !important;
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 1024px) {
        .carousel-item>img {
            height: 850px !important;
            width: 100% !important;
        }
    }

    @media only screen and (max-width:1280px) {
        .carousel-item>img {
            max-height: 80%;
            height: 600px !important;
            width: 100% !important;
        }
    } */
    @media only screen and (device-width : 768px) and (device-height:1024px) {
        .carousel-item>img {
            height: 60% !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width : 1024px) and (device-height: 768px) {
        .carousel-item>img {
            height: 60% !important;
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

    @media only screen and (device-width : 60%) and (device-height: 900px) {
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
        .carousel-item>a>img {
            height: 600px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :1920px) and (device-height:1080px) {
        .carousel-item>a>img {
            max-height: 350px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :1366px) and (device-height:768px) {
        .carousel-item>a>img {
            height: 300px !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :2560px) and (device-height:1440px) {
        .carousel-item>img {
            height: 60% !important;
            width: 100% !important;
        }
    }
    @media only screen and (device-width :2048px) and (device-height:1080px) {
        .carousel-item>img {
            height: 60% !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :3840px) and (device-height:2160px) {
        .carousel-item>img {
            height: 60% !important;
            width: 100% !important;
        }
    }

    @media only screen and (device-width :4096px) and (device-height:2160px) {
        .carousel-item>img {
            height: 60% !important;
            width: 100% !important;
        }
    }
    .exp-product-menu span:hover>button {
        color: #39f
            /* amigo:  #0069A7 */
            /* rgb(34, 34, 34)*/
    }

    .exp-product-menu span>button:focus {
        color: #39f
    }

    .news-menu span:hover>button {
        color: #39f
            /* amigo:  #0069A7 */
            /* rgb(34, 34, 34)*/
    }

    .news-menu span>button:focus {
        color: #39f
    }
    .carousel img {

    margin: auto;


}


</style>

@endsection
@section('content')
<main class="main">
    <div id="demo2" class="carousel slide" data-ride="carousel">
        <!-- The slideshow -->
        @php
            $j = 1;
        @endphp
        <div class="carousel-inner">
            @foreach ($sliders as $slider)
                <div class="carousel-item{{ $j == 1 ? ' active' : '' }}">
                    <a href="{{$slider->slider_url}}"><img src="{{asset($slider->slider)}}" alt=""></a>
                </div>
                @php
                $j++ ;
                @endphp
            @endforeach
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo2" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo2" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>

                <li class="breadcrumb-item active" aria-current="page" href="{{url('/about-us')}}">About Us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div class="page-content">
        {{-- <div id="map" class="mb-5"></div><!-- End #map --> --}}
        <div class="container">
            <div class="row">
                <div class="col-12 text-center description">
                    @foreach ($about_us as $item)
                    {!!$item->description !!}
                    @endforeach
                </div>
            </div>



        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
