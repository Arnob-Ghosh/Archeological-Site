@extends('layouts.frontend.front-master')
@section('title', 'AMIGO - Feature Phone')
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
                <li class="breadcrumb-item"><a href="{{ url('/feature-phone') }}">Feature Phone</a></li>
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
                            <div class="product-details product-details-centered">

                                <figure class="product-main-image">
                                    {{-- <a id="variant-zoom"
                                        href="{{asset($item->feature_phone[0]->over_view_image_large)}}"
                                        class="MagicZoom" data-options="zoomPosition: inner"><img id="product-zoom"
                                            src="{{ asset($item->feature_phone[0]->over_view_image) }}"
                                            alt="product image" /></a> --}}

                                    {{-- <a id="variant-zoom"
                                        href="{{asset($item->feature_phone[0]->over_view_image_large)}}"
                                        class="MagicZoom" data-options="zoomPosition: inner"><img id="product-zoom"
                                            src="{{ asset($item->feature_phone[0]->over_view_image) }}"
                                            alt="product image" /></a> --}}



                                    <img id="product-zoom" src="{{ asset($item->feature_phone[0]->over_view_image) }}"
                                        data-zoom-image="{{asset($item->feature_phone[0]->over_view_image_large)}}"
                                        alt="product image">
                                    {{-- {{ asset($item->feature_phone[0]->over_view_image) }} --}}

                                </figure><!-- End .product-main-image -->



                            </div><!-- End .product-gallery -->
                            <h3 hidden> {{ $box_image = $item->in_box_image }} </h3>
                            @php
                            $i = 1;
                            @endphp
                            <div class="details-filter-row details-row-size">
                                <label>Color:</label>


                                <div class=" product-nav product-nav-thumbs  item-hover-variant-image"
                                    id="variant-image-{{ $i }}">
                                    @foreach ($item->feature_phone as $image)
                                    <a href=" #" class="active" id="ab-{{ $i }}">
                                        <img src="{{ asset($image->colour_thumbnail) }}" alt="product desc"
                                            style="width: 40px;height:40px;">
                                    </a>
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach
                                </div><!-- End .product-nav -->

                            </div><!-- End .details-filter-row -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">

                                <h3>{{ $item->model_name }}</h3>
                                <!-- End .product-title -->





                                <div class="product-details-action" alt="Responsive image">
                                    <img src="{{ asset($item->highlighted_spec) }}" alt="product desc"
                                        style="max-width : 100%!important;height:100% !important">
                                    {{-- <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>

                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to
                                                Wishlist</span></a>
                                        <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to
                                                Compare</span></a>
                                    </div><!-- End .details-action-wrapper --> --}}
                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">Feature Phone</a>
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
                    <ul class="nav nav-pills justify-content-left" role="tablist">
                        <li class="nav-item">
                            <a style="font-weight: 600 !important;" class="nav-link active" id="product-desc-link"
                                class="amigo-font" data-toggle="tab" href="#product-desc-tab" role="tab"
                                aria-controls="product-desc-tab" aria-selected="true">
                                Specification
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab"
                                role="tab" aria-controls="product-info-tab" aria-selected="false">Additional
                                information</a>
                        </li> --}}
                        <li class="nav-item">
                            <a style="font-weight: 600 !important;" class="nav-link" id="product-shipping-link"
                                data-toggle="tab" href="#product-shipping-tab" role="tab"
                                aria-controls="product-shipping-tab" aria-selected="false">In The Box</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                                role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link" style="font-weight: 600 !important;color:black">
                            <div class="product-desc-content">
                                <div class="mt-2"></div>
                                <h2 class="amigo-font">Product Specification</h2>

                                <div class="table-responsive">

                                    <table class="t1" style=" width:100%">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tbody id="zone_data"></tbody>
                                    </table>


                                    {{-- <table id="description" class="table " style=" width:100%">


                                        <thead>

                                            <tr>
                                                <th class="hidden">Category</th>
                                                <th class="hidden">Feature Name</th>
                                                <th class="hidden">Description</th>

                                            </tr>
                                        </thead>

                                    </table> --}}
                                </div>
                                {{-- @foreach ($descriptions as $description)
                                <P>{{$description->}}</P>
                                @endforeach --}}

                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                            aria-labelledby="product-shipping-link">

                            <div class="product-desc-content">
                                <img src="{{ asset($box_image) }}" style="width: 100%" class="img-fluid"
                                    alt="Responsive image">
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

@section('script')
<script src="{{ asset('dataTable/datatables.min.js') }}"></script>
<script src="{{ asset('dataTable/Buttons-2.2.2/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('dataTable/JSZip-2.5.0/jszip.min.js') }}"></script>
<script src="{{ asset('dataTable/pdfmake-0.1.36/pdfmake.js') }}"></script>
<script src="{{ asset('dataTable/dataTables.rowsGroup.js') }}"></script>
<script src="{{ asset('dataTable/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
<script src="{{ asset('dataTable/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
<script src="{{ asset('dataTable/Buttons-2.2.2/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dataTable/Buttons-2.2.2/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('dataTable/Responsive-2.2.9/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('frontend/assets/js/jquery.elevateZoom.min.js')}}"></script>
<script>
    $("#product-zoom").elevateZoom({scrollZoom : true,
        responsive:true,

         zoomType: 'inner',
    cursor: 'crosshair',
    zoomWindowWidth: 600,
zoomWindowHeight: 600,

        });

    $(document).on('mouseover', '#variant-zoom', function () {

      var image_value;
        $('#variant-zoom img').attr('src', image_value=($('img', this).attr('src'))
        );

        // alert('image_value '+image_value)
    });

        $(document).on('click', '.item-hover-variant-image a', function() {
            var zoomConfig = {cursor: 'crosshair', zoomType: "inner" };
            var id_str = $(this).attr('id');
            var id = id_str.replace('ab-', '');

            var image = $(this).find('img').attr('src')
            zoomImage=    $('#product-zoom');

            var over_view_image = image.replace('http://127.0.0.1:8000/uploads/product/featurephone/variant/', '');

            $.ajax({
                type: "GET",
                url: "/get-over-view-images/" + over_view_image,
                success: function(response) {
                    if (response.status == 200) {

                        $.each(response.data, function(key, item) {


                            var image = '/' + item.over_view_image
                            var over_view_image_large = '/' + item.over_view_image_large


                            $('#product-zoom').attr('src', image);
                            $('.zoomContainer').remove();
                            zoomImage.removeData('elevateZoom');
                            zoomImage.data('zoom-image', over_view_image_large);
                            zoomImage.elevateZoom(zoomConfig);



                        });


                    }
                },
            });



        });


$(document).ready(function(){
    var url = window.location.pathname;
var id = url.substring(url.lastIndexOf('/') + 1);

    $.ajax({
        type: "GET",
        url: "/feature-phone-view-specification/"+id,
        dataType: "json",
        success: function (response) {
            // console.log(response.data)
            $("#table_data").html("");

            function createRowHTML() {
                var tableContent = "";
                let  rowspan;
        $.each(response.data, function (key, item) {
            rowspan  =item.length;
            // alert(item.length)
            tableContent += "<tr style=font-size:"+"1.6rem/1.86!important;"+"  class=linetd mb-2><td rowspan=" + parseInt(1 + rowspan) + " ><h5>" +item.category_name + "</h5></td></tr>";

            $.each(item.details, function (k, value) {
                tableContent += "<tr  class=linetd2><td >" +value.feature_name + "</td><td>" +value.description + "</td></tr>";
                // tableContent += "<tr><td >" +value.description + "</td></tr>";
            })
            $(".linetd").append('<hr>');
        });
        // console.log(tableContent)
        $("tbody#zone_data").append(tableContent);
    }
    $(function () {
        createRowHTML();
    });


        },
    });
});


</script>

@endsection
