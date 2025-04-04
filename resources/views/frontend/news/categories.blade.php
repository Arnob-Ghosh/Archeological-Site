@extends('layouts.frontend.front-master')
@section('title', 'Collections')
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
</style>
@endsection
@section('content')
<main class="main">
    <div class="page-header text-center"
        style="height:150px; width:100%; margin-top:-12px; background-image: url('{{asset('frontend/assets/images/5.png')}}')">
        <div class="container">
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav ">
        <div class="container">
            <div class="row">
            <div class="col-lg-2 cold-md-2 col-sm-2 col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Collection</li>
            </ol>
        </div>
                <div class="col-lg-2 cold-md-2 col-sm-4 col-3 mt-1 text-right"> <h4>Sort By</h4></div>
                <div class="col-lg-4 cold-md-4 col-sm-4 col-4">

                    <div class="dropdown">


                       
                            <select  name="cat" id="cat" style="background-color: #ffffff; color: rgb(54, 52, 52);  padding: 10px; width:70%">
                            <option class="dropdown-item" value="0">all</option>
                          <option class="dropdown-item" value="1">object Type</option>
                          <option class="dropdown-item" value="2">Accession Number</option>
                            </select>
                       
                      </div>
                </div>
                <div class="col-lg-4 cold-md-4 col-sm-6 col-5 ">

                    <input type="text" placeholder="Search.." id="query" style="width: 70%; background-color: #ffffff; color: rgb(54, 52, 52);  padding: 6px; ">
                    <button id="search" type="submit" style="background-color: #ffffff; color: rgb(54, 52, 52); border: none; padding: 10px;"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </nav><!-- End .breadcrumb-nav -->


{{-- <div class=sf-with-ul>
        <select id="category-select">
            <option value="">All Categories</option>
            @foreach ($category as $categories)
           <option value="{{$categories->category_name}}">{{$categories->category_name}}</option>
            @endforeach

        </select></div> --}}







<div class="container" id="high" style="margin-top:-25px;">
    <h2>Collection Highlight</h2>
    <div id="highlightCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" id="highlight" data-layout="fitRows"></div>
        <a class="carousel-control-prev" href="#highlightCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#highlightCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div><!-- End .container -->


        <div class="container">
            <div class="mb-3"></div>
            <h2>Collection Themes</h2>
            <div id="example" class="row " >


            </div><!-- End .entry-container -->



        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection

@section('script')
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script type="text/javascript" src="{{ asset('dist/js/hip.js') }}"></script>
<script>
    // $(".hip-item").css("background-color", "yellow");

    $(document).ready(function(){

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

<script>
    $(document).ready(function() {
        function generateCarousel() {
            $.ajax({
                type: "get",
                url: "/highlight",
                success: function(response) {
                    var carouselInner = $('#highlight');
                    var carouselIndicators = $('.carousel-indicators');

                    // Calculate the number of items per row
                    var itemsPerRowDesktop = 3;
                    var itemsPerRowMobile = 1;
                    var totalItems = response.News.length;
                    var numRows = Math.ceil(totalItems / itemsPerRowDesktop);
                    var activeRow = 0;

                    // Generate carousel items
                    for (var i = 0; i < numRows; i++) {
                        var activeClass = i === 0 ? 'active' : '';
                        var carouselItem = $('<div class="carousel-item ' + activeClass + '"></div>');

                        // Generate row container
                        var rowContainer = $('<div class="row"></div>');

                        // Generate items for current row
                        var itemsPerRow = $(window).width() < 768 ? itemsPerRowMobile : itemsPerRowDesktop;
                        for (var j = 0; j < itemsPerRow; j++) {
                            var itemIndex = (i * itemsPerRowDesktop) + j;
                            if (itemIndex < totalItems) {
                                var news = response.News[itemIndex];
                                var newsItem = $('<div class="col-md-4 col-lg-4 col-12 hip-item"></div>');
                                var newsList = $('<div class="news_list" style="background-color:#ffffff;margin-bottom: 3rem;" id="news_list"></div>');
                                var newsLink = $('<a href="/news-details/' + news.id + '"></a>');
                                var newsImage = $('<img src="' + news.news_thumbnail + '" class="img-fluid mx-auto d-block" style="width: 100%; height: 250px;" alt="image desc">');
                                var entryBody = $('<div class="entry-body" style="padding: 1.6rem 2rem 1.8rem; height: 76px;"></div>');
                                var entryTitle = $('<h3 class="entry-title" style="color: #333;font-weight: 600;font-size: 1.8rem;"></h3>');

                                entryTitle.text(news.news_title);

                                entryBody.append(entryTitle);
                                newsLink.append(newsImage);
                                newsList.append(newsLink, entryBody);
                                newsItem.append(newsList);
                                rowContainer.append(newsItem);
                            }
                        }

                        carouselItem.append(rowContainer);
                        carouselInner.append(carouselItem);

                        // Generate carousel indicators
                        var activeIndicatorClass = i === 0 ? 'active' : '';
                        var carouselIndicator = $('<li data-target="#highlightCarousel" data-slide-to="' + i + '" class="' + activeIndicatorClass + '"></li>');
                        carouselIndicators.append(carouselIndicator);
                    }

                    $('.carousel').carousel({
                        interval: 5000, // Set interval for auto slide (in milliseconds)
                        pause: 'hover' // Pause slide on mouse hover
                    });
                }
            });
        }

        // Call the function when the page loads
        generateCarousel();

        // Call the function again on window resize to adjust the number of items per row
        $(window).on('resize', function() {
            // Clear the existing carousel
            $('#highlight').empty();
            $('.carousel-indicators').empty();
            generateCarousel();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $.ajax({
            type: "get",
            url: "/cat",
            success: function(response) {
                console.log(response);
                $.each(response.category, function(id, news) {
                    // console.log(news);
                    $('#example').append('<div class="col-sm-6 col-md-4 col-lg-4 card hip-item">' +
                        '<div class="news_list " style="background-color:#ffffff;margin-bottom: 3rem;" id="news_list">' +
                        '<a href="/collection/'+news.category_name+'">' +
                        '<img src="' + news.category_image + '" class="img-fluid mx-auto d-block" style="width: 100%; height: 250px;" alt="image desc">' +
                        '</a>' +
                        '<div class="entry-body" style="padding: 1.6rem 2rem 1.8rem; height: 76px;">' +
                        '<h3 class="entry-title" style="color: #333;font-weight: 600;font-size: 1.8rem;">' +
                        '<a href="/collection/'+news.category_name+'" style="color: #333">' +
                            news.category_name +

                        '</a>' +
                        '</h3>' +
                        '<h6 class="my-2">'+news.desc+'</h6>'+
                        '</div>'+
                        '</div>' +
                        '</div>');
                });
                jQuery("#example").hip({

itemsPerPage: 9,
 itemsPerRow: 3,
itemGaps: '20px'
// , filter: true
// , filterPos: 'center'
// , paginationPos: 'left'

});
            }
        });
    });
</script>

<script>

$('#search').click(function(e)
{
    // e.preventDefault();
    $('#example').empty();
    $('#high').hide();
let id=$('#query').val();
let cat=$('#cat').val();
//  alert(id)

// console.log(cat);

$.ajax({
            type: "get",
            url: "/search/"+id+"/"+cat,
            success: function(response) {
                 //console.log(response);
                $.each(response.News, function(id, news) {
                    //console.log(news);
                    $('#example').append('<div class="col-sm-6 col-md-4 col-lg-4 hip-item">' +
                        '<div class="news_list" style="background-color:#ffffff;margin-bottom: 3rem;" id="news_list">' +
                        '<a href="/news-details/'+news.id+'">' +
                        '<img src="' + news.news_thumbnail + '" class="img-fluid mx-auto d-block" style="width: 100%; height: 250px;" alt="image desc">' +
                        '</a>' +
                        '<div class="entry-body" style="padding: 1.6rem 2rem 1.8rem; height: 76px;">' +
                        '<h3 class="entry-title" style="color: #333;font-weight: 600;font-size: 1.8rem;">' +
                        '<a href="/news-details/'+news.id+'" style="color: #333">' +
                            news.news_title +
                        '</a>' +
                        '</h3>' +
                        '</div>'+
                        '</div>' +
                        '</div>');
                });
            }
        });
});
</script>
@endsection
