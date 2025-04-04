@extends('layouts.frontend.front-master')
@section('title', 'AMIGO - Feature Phone')
@section('head')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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

    .amigo-col {
        background-color: #f3f3f3;
    }

    .header-menu-custom {
        margin-top: 2%,
            margin-bottom: 2%,
    }

    /* .overview>ul>li:first-child {
                        margin-left: 5%;
                    } */
    /* .overview>ul>li::not(:first-child) {
                        margin-left: 70% !important;
                    } */

    /* .overview>ul {
                        margin-left: 70% !important;

                    } */

    /* .overview>p {
                        float: left;
                        margin-left: 20% !important;

                    } */
    #product-desc-tab p {
        font-weight: 600 !important;
        color: black
    }

    .over_view_img_btn .btn {
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: #555;
        color: white;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
    }

    .over_view_img_btn div {
        margin-left: 10% !important;
        margin-right: 10% !important;
    }



    .overview li>a {
        color: rgb(0, 0, 0)
            /* amigo:  #0069A7 */
            /* rgb(34, 34, 34)*/
    }

    .overview li:hover>a,
    .overview li.show>a,
    .overview li:active>a {
        color: #39f
            /* amigo:  #0069A7 */
            /* rgb(34, 34, 34)*/

    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<main class="main amigo-col">
    {{-- <h3>{{ $data}}</h3> --}}
    @php
    $model_name;
    $in_box_image;
    $over_view_image_large;
    foreach ($data as $key => $item) {
    $model_name = $item->model_name;
    $in_box_image = $item->in_box_image;

    $over_view_image_large = $item->feature_phone[0]->over_view_image_large;
    // foreach ($item->feature_phone[0] as $key => $value) {
    // $over_view_image_large = $value->over_view_image_large;
    // }
    }
    @endphp

    <div class=" pt-1 pb-1" style="background-color:#e8e8e8!important">

        <div class="container overview">
            <ul class="nav nav-pills ">
                <li style="margin-left: 5px!important;  ">
                    <h3>{{ $model_name }}</h3>
                </li>
                <li style="margin-left: auto;margin-right: !important;margin-top:3px; " class="pr-3 overview_btn"><a
                        data-toggle="pill" style="font-size: 1.2em;" href="#overview">Overview</a>
                </li>
                <li class="pr-3 spec" style="margin-top:3px;"><a data-toggle="pill" style="font-size: 1.2em;"
                        href="#spec">Spec</a>
                </li>
                {{-- <li class="pr-3" style="margin-top:3px;"><a data-toggle="pill" style="font-size: 1.2em;"
                        href="#in_the_box">In The
                        Box</a>
                </li> --}}
                <li class="pr-3" style="margin-top:3px;"><a style="font-size: 1.2em;" id="in_the_box_button" href="#">In
                        The
                        Box</a>
                </li>

            </ul>

        </div>



    </div>
    <div class="tab-content">
        <div></div>
        <div class="tab-pane fade show active" style="padding: 0rem 0rem!important;" id="overview">
            @php
            $upper_image;
            @endphp
            @foreach ($over_view_images as $item)
            @php
            $upper_image = $item->upper_image;
            @endphp
            @if ($upper_image != 'null')
            <img src="{{ asset($upper_image) }}" class="img-responsive center-block d-block mx-auto" alt="Responsive image">
                {{-- <img src="{{ asset($upper_image) }}" style=" display: flex; justify-content: center;" class="img-fluid" alt="Responsive image"> --}}
            @endif
            @endforeach
            <div  id="over_view_image_div">
                <div class=" center-block" style=" background-color: #FFFFFF;">
                    <img src=" {{ asset($over_view_image_large) }}" id="colour_thumbnail_image"
                    class="img-responsive center-block d-block mx-auto" alt="Sample Image" style="z-index: 1;   position: relative;">
                    @foreach ($data as $item)
                    @php
                    $i = 1;
                    @endphp

                    <div class="center item-hover-variant-image  " style=" display: flex; justify-content:
                        center;">
                        @foreach ($item->feature_phone as $image)
                        <a href="javascript:void(0)" class="active" id="ab-{{ $i }}">
                            <img src="{{ asset($image->colour_thumbnail) }}"
                                class="img-responsive center-block d-block mx-auto mb-2" alt="product desc"
                                style="width: 40px;height:40px; margin-left:5px!important" style="z-index: 3;background-color: #FFFFFF;    position: relative;">
                        </a>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </div>
                    @endforeach

                </div>
                {{-- <div class="container">
                    <div class="over_view_img_btn">
                        <div style=" border-radius: 40px ; background-color: #cccccc;">
                            <div>
                                <img src=" {{ asset($over_view_image_large) }}" id="colour_thumbnail_image"
                                    class="img-responsive center-block d-block mx-auto pt-2  pb-2" alt="Sample Image">

                            </div>


                            @foreach ($data as $item)
                            @php
                            $i = 1;
                            @endphp

                            <div class="center item-hover-variant-image  pb-2" style=" display: flex; justify-content:
                                center;">
                                @foreach ($item->feature_phone as $image)
                                <a href="javascript:void(0)" class="active" id="ab-{{ $i }}">
                                    <img src="{{ asset($image->colour_thumbnail) }}"
                                        class="img-responsive center-block d-block mx-auto " alt="product desc"
                                        style="width: 40px;height:40px; margin-left:5px">
                                </a>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div> --}}

            </div>

            @foreach ($over_view_images as $item)
            @php
            $lower_image = $item->lower_image;
            @endphp
            @if ($lower_image != 'null')
            <img src="{{ asset($lower_image) }}" class="img-responsive center-block d-block mx-auto" alt="Responsive image">
            @endif
            @endforeach
        </div>
    </div>
    <div id="in_the_box_div">
        <img src="{{ asset($in_box_image) }}" class="img-responsive center-block d-block mx-auto" alt="Responsive image">
    </div>


    <div class="tab-pane fade" id="spec" style="font-weight: 600 !important;color:black">
        <div class="product-desc-content" id="product-desc-tab">

            <div class="container">

                <div class="table-responsive">

                    <table class="t1" style=" width:100%">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tbody id="zone_data"></tbody>
                    </table>
                </div>


            </div>

        </div><!-- End .product-desc-content -->


    </div>

    </div>

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
<script src="{{ asset('frontend/assets/js/jquery.elevateZoom.min.js') }}"></script>
<script>
    $("#product-zoom").elevateZoom({
            scrollZoom: true,
            responsive: true,

            zoomType: 'inner',
            cursor: 'crosshair',
            zoomWindowWidth: 600,
            zoomWindowHeight: 600,

        });
        // $(document).on('click', '#spec', function() {

        // });
        $(document).on('mouseover', '#variant-zoom', function() {

            var image_value;
            $('#variant-zoom img').attr('src', image_value = ($('img', this).attr('src')));

            // alert('image_value '+image_value)
        });
        $(document).on('click', '.spec', function() {
            $('#in_the_box_div').hide()
            $('#overview').hide()

            $('#spec').show()
        });
        $(document).on('click', '.overview_btn', function() {
            // $('#spec').hide()
            // $("#overview").fadeIn();
            // ('#in_the_box_div').fadeIn()
            setTimeout(
                function() {
                    $('#in_the_box_div').show()
                    $("#overview").fadeIn();
                    // $('#overview').show()
                    $('#spec').hide()
                }, 300
            );

        });

        $("#in_the_box_button").click(function() {
            $('#spec').hide()
            $('#in_the_box_div').show()
            $('html, body').animate({
                scrollTop: $("#in_the_box_div").offset().top
            }, 1000);
        });


        $(document).on('click', '.item-hover-variant-image a', function() {

            var id_str = $(this).attr('id');
            var id = id_str.replace('ab-', '');
            var base_url = window.location.origin;

            var image = $(this).find('img').attr('src')


            var over_view_image = image.replace(''+base_url+'/uploads/product/featurephone/variant/', '');

            $.ajax({
                type: "GET",
                url: "/get-over-view-images/" + over_view_image,
                success: function(response) {

                    if (response.status == 200) {
                        // console.log(response.data)
                        $.each(response.data, function(key, item) {


                            var image = '/' + item.over_view_image
                            var over_view_image_large = '/' + item.over_view_image_large

                            $("#colour_thumbnail_image").fadeOut(500, function() {
                                $('#colour_thumbnail_image').attr('src', image);
                            }).fadeIn(500);
                            return false;

                        });


                    }
                },
            });



        });


        $(document).ready(function() {
            $('#spec').hide()
            var url = window.location.pathname;
            var id = url.substring(url.lastIndexOf('/') + 1);

            $.ajax({
                type: "GET",
                url: "/feature-phone-view-specification/" + id,
                dataType: "json",
                success: function(response) {
                    // console.log(response.data)
                    $("#table_data").html("");

                    function createRowHTML() {
                        var tableContent = "";
                        let rowspan;
                        $.each(response.data, function(key, item) {
                            rowspan = item.length;
                            // alert(item.length)
                            tableContent += "<tr style=font-size:" + "1.6rem/1.86!important;" +
                                "  class=linetd mb-2><td rowspan=" + parseInt(1 + rowspan) +
                                " ><h5>" + item.category_name + "</h5></td></tr>";

                            $.each(item.details, function(k, value) {
                                tableContent += "<tr  class=linetd2><td >" + value
                                    .feature_name + "</td><td>" + value.description +
                                    "</td></tr>";
                                // tableContent += "<tr><td >" +value.description + "</td></tr>";
                            })
                            $(".linetd").append('<hr>');
                        });
                        // console.log(tableContent)
                        $("tbody#zone_data").append(tableContent);
                    }
                    $(function() {
                        createRowHTML();
                    });


                },
            });
        });
</script>

@endsection
