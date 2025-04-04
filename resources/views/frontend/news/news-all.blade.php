@extends('layouts.frontend.front-master')
@section('title', 'Collection')
@section('head')
<meta name="theme-color" content="#ffffff">


<style>
     #news_list:hover {
        transition: transform .3s;
        -ms-transform: scale(1.05);
        /* IE 9 */
        -webkit-transform: scale(1.05);
        /* Safari 3-8 */
        transform: scale(1.05);

    }
    h4{
color: black;
}
</style>
@endsection
@section('content')
<main class="main">
    <div class="page-header text-center"
        style="height:150px; width:100%; margin-top:-12px; background-image: url('{{ asset($category[0]->title_image) }}')">

    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Colection</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->



    <div class="page-content">
        <div class="container">
            <div id="example" class="row hip-grid" data-layout="fitRows">

                @foreach ($news as $item)

                <div class="col-sm-6 col-md-4 col-lg-4 hip-item" style="">
                    <div style=" background-color:#ffffff;margin-bottom: 1rem;"
                        id="news_list">

                                <div style=" background-color: #ffffff;">
                            <a href="{{ route('front.news.details', $item->id) }}">
                                <img src="{{ asset($item->news_thumbnail) }}" class="img-fluid  mx-auto d-block"
                                    style="width: 100%; height:250px;"
                                    alt="image desc">
                            </a>
                    </div>

                    <div class="entry-body" style="padding:1.6rem 2rem 1.8rem;height:76px;">


                        <h3 class="entry-title" style="color: #333;font-weight: 600;font-size: 1.8rem;">
                            <a href="{{ route('front.news.details', $item->id) }}" style="color: #333">{{
                                $item->news_title }}</a>
                        </h3><!-- End .entry-title -->

                    </div><!-- End .entry-body -->


                </div>

            </div>



                @endforeach
            </div><!-- End .entry-container -->


        </div><!-- End .container -->
        <div class="container" >
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12"  >
                   {!!$category[0]->description!!}
                </div>
            </div>
        </div>
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection

@section('script')
<script type="text/javascript" src="{{ asset('dist/js/hip.js') }}"></script>
<script>
    // $(".hip-item").css("background-color", "yellow");
    $("#example").hip({

            itemsPerPage: 9
            , itemsPerRow: 3
            , itemGaps: '30px'
            // , filter: true
            // , filterPos: 'center'
            // , paginationPos: 'left'

        });

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
