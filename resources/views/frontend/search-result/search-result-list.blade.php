@extends('layouts.frontend.front-master')
@section('title', 'AMIGO - Search Result')
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
                <h1 class="page-title">Search Result </h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>


                    <li class="breadcrumb-item active" aria-current="page"> Showing search result of &nbsp; "{{$search}}"</li>

                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->


        <div class="page-content">
            {{-- <div id="map" class="mb-5"></div><!-- End #map --> --}}
            <div class="container">
                {{-- <h6>Showing search result of "{{$search}}"</h6> --}}
                {{-- <div class="row">
                    <div class="col-12 text-center description">

                        @if ($feature_phone != 'null')
                            @foreach ($feature_phone as $item)
                            {!! $item !!}
                            @endforeach

                        @endif

                        @if ($smart_phone != 'null')
                            {!! $smart_phone !!}
                        @endif
                        @if ($accessories != 'null')
                            {{ $accessories }}
                        @endif



                    </div>
                </div> --}}
                @if ($feature_phone != 'null')


                <div class="container for-you">
                    <div class="heading heading-flex mb-3">
                        <div class="heading-left">
                            <h2 class="title">Feature Phone </h2><!-- End .title -->
                        </div><!-- End .heading-left -->

                       {{-- <div class="heading-right">
                            <a href="#" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a>
                       </div><!-- End .heading-right --> --}}
                    </div><!-- End .heading -->

                    <div class="products">
                        <div class="row">
                            @foreach ($feature_phone as $item)
                            {{-- {!! $item !!} --}}
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="product product-2">
                                    <figure class="product-media">
                                        {{-- <span class="product-label label-circle label-sale">Sale</span> --}}
                                        <a href="{{route('frontend.categry.feature.phone.details',$item ->id)}}">
                                            <img src="{{asset($item ->default_image)}}" alt="Product image" class="product-image">
                                        </a>
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        {{-- <div class="product-cat">
                                            <a href="#">Headphones</a>
                                        </div><!-- End .product-cat --> --}}
                                        <h3 class="product-title text-center"><a href="{{route('frontend.categry.feature.phone.details',$item ->id)}}">{{$item ->model_name}}</a></h3><!-- End .product-title -->

                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                            @endforeach



                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- End .container -->


                 @endif

                 @if ($smart_phone != 'null')


                 <div class="container for-you">
                     <div class="heading heading-flex mb-3">
                         <div class="heading-left">
                             <h2 class="title">Smart Phone </h2><!-- End .title -->
                         </div><!-- End .heading-left -->

                        {{-- <div class="heading-right">
                             <a href="#" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .heading-right --> --}}
                     </div><!-- End .heading -->

                     <div class="products">
                         <div class="row">
                             @foreach ($smart_phone as $item)
                             {{-- {!! $item !!} --}}
                             <div class="col-6 col-md-4 col-lg-3">
                                 <div class="product product-2">
                                     <figure class="product-media">
                                         {{-- <span class="product-label label-circle label-sale">Sale</span> --}}
                                         <a href="{{route('frontend.categry.smart.phone.details',$item ->id)}}">
                                             <img src="{{asset($item ->default_image)}}" alt="Product image" class="product-image">
                                         </a>
                                     </figure><!-- End .product-media -->

                                     <div class="product-body">
                                         {{-- <div class="product-cat">
                                             <a href="#">Headphones</a>
                                         </div><!-- End .product-cat --> --}}
                                         <h3 class="product-title text-center"><a href="{{route('frontend.categry.smart.phone.details',$item ->id)}}">{{$item ->model_name}}</a></h3><!-- End .product-title -->

                                     </div><!-- End .product-body -->
                                 </div><!-- End .product -->
                             </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                             @endforeach



                         </div><!-- End .row -->
                     </div><!-- End .products -->
                 </div><!-- End .container -->


                  @endif

                  @if ($accessories != 'null')

               @php
                 $accessories_details;
                      foreach ($accessories as $key => $item) {
                    // $model_name = $item->model_name;
                    // $in_box_image = $item->in_box_image;

                    $accessories_details =$item->accesory;

                    // foreach ($item->feature_phone[0] as $key => $value) {
                    // $over_view_image_large = $value->over_view_image_large;
                    // }
                    }
               @endphp
               {{-- @foreach ($over_view_image_large as $item)
               {{$item->product_name}}
               @endforeach --}}

                  <div class="container for-you">
                      <div class="heading heading-flex mb-3">
                          <div class="heading-left">
                              <h2 class="title">Accessories </h2><!-- End .title -->
                          </div><!-- End .heading-left -->


                      </div><!-- End .heading -->

                      <div class="products">
                          <div class="row">

                              @foreach ($accessories_details as $item)

                              <div class="col-6 col-md-4 col-lg-3">
                                  <div class="product product-2">
                                      <figure class="product-media">

                                          <a href="{{route('frontend.accessories.details',$item ->id)}}">
                                              <img src="{{asset($item ->default_image)}}" alt="Product image" class="product-image">
                                          </a>
                                      </figure><!-- End .product-media -->

                                      <div class="product-body">

                                          <h3 class="product-title text-center"><a href="{{route('frontend.accessories.details',$item ->id)}}">{{$item ->product_name}}</a></h3><!-- End .product-title -->

                                      </div><!-- End .product-body -->
                                  </div><!-- End .product -->
                              </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                              @endforeach



                          </div><!-- End .row -->
                      </div><!-- End .products -->
                  </div><!-- End .container -->


                   @endif

            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
