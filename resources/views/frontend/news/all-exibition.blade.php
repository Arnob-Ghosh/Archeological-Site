@extends('layouts.frontend.front-master')
@section('title', 'Exibition')
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
{{--
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.min.css')}}"> --}}
<style>
     #news_list:hover {
        transition: transform .3s;
        -ms-transform: scale(1.05);
        /* IE 9 */
        -webkit-transform: scale(1.05);
        /* Safari 3-8 */
        transform: scale(1.05);


</style>
@endsection
@section('content')
<main class="main">
    <div class="page-header text-center"
        style="background-image: url('{{asset('frontend/assets/images/abc.png')}}')">
        <div class="container">
            <h1 style="color: rgb(1, 1, 1);" class="page-title">Exibition</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Exibition</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->



    <div class="page-content">
        <div class="container-fluid">
            <div class="mb-3"></div><!-- End .mb-3 -->

            <div id="example" class="row hip-grid" data-layout="fitRows">




            </div><!-- End .entry-container -->

            {{-- {!! $news->render() !!} --}}

            {{-- <div class="mb-3"></div><!-- End .mb-3 -->

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
                    <li class="page-item">
                        <a class="page-link page-link-next" href="#" aria-label="Next">
                            <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                        </a>
                    </li>
                </ul>
            </nav> --}}

        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection

@section('script')
<script type="text/javascript" src="{{ asset('dist/js/hip.js') }}"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: "get",
            url: "/exibition",
            success: function(response) {

                $.each(response.exibition, function(id, exibition) {
                    var startDate = new Date(exibition.start_date);
                    var endDate = new Date(exibition.end_date);
                    var formattedStartDate = startDate.getDate() + ' ' + getMonthName(startDate.getMonth()) + ' ' + startDate.getFullYear();
                    var formattedEndDate = endDate.getDate() + ' ' + getMonthName(endDate.getMonth()) + ' ' + endDate.getFullYear();

                    $('#example').append('<div class="col-sm-6 col-md-3 col-lg-3 card hip-item">' +
                        '<div class="news_list" style="background-color:#ffffff;margin-bottom: 3rem;" id="news_list">' +
                        '<a href="/exibition-details/'+exibition.id+'">' +
                        '<img src="' + exibition.thumbnail + '" class="img-fluid mx-auto d-block" style="width: 100%; height: 250px;" alt="image desc">' +
                        '</a>' +
                        '<div class="entry-body" style="padding: 1.6rem 2rem 1.8rem; height: 76px;">' +
                        '<h3 class="entry-title" style="color: #333;font-weight: 600;font-size: 1.8rem;">' +
                        '<a href="/exibition-details/'+exibition.id+'" style="color: #333">' +
                            exibition.title  +
                        '</a>' +
                        '</h3>' +
                       '<h6>' + formattedStartDate + ' - ' + formattedEndDate + '</h6>' +
                        '</div>'+
                        '</div>' +
                        '</div>');
                });

                jQuery("#example").hip({
                    itemsPerPage: 8,
                    itemsPerRow: 4,
                    itemGaps: '20px'
                    // , filter: true
                    // , filterPos: 'center'
                    // , paginationPos: 'left'
                });
            }
        });
    });
    function getMonthName(monthIndex) {
        var months = [
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ];
        return months[monthIndex];
    }
</script>




<script>
    $(document).ready(function(){

     $(document).on('click', '.pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
     });

     function fetch_data(page)
     {
      $.ajax({
       url:"get_ajax_data?page="+page,
       success:function(data)
       {
        $('#table_data').html(data);
       }
      });
     }

    });
</script>

@endsection
