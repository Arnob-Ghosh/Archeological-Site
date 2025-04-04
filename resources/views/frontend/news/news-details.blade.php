@extends('layouts.frontend.front-master')
@section('title', 'Details')
@section('head')
<meta name="theme-color" content="#ffffff">
<link rel="stylesheet" href="">
@endsection
@section('content')
<main class="main">

    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('front.categories.all')}}">Collections</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($news->news_title, 5) }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" >
          
                <div class="" >
                    <img src="{{ asset($news->news_image) }}" alt="image desc" >

                </div><!-- End .owl-carousel -->
            
        </div>
    </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <article class="entry single-entry">
                        <div class="entry-body">
                            <div class="entry-meta">

                                <span class="meta-separator">|</span>
                                <a href="#">{{
                                    Carbon\Carbon::parse($news->created_at)->format('j F Y')
                                    }}</a>

                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title entry-title-big">
                                {{ $news->news_title }}
                            </h2><!-- End .entry-title -->

                            <div class="entry-content editor-content">
                                {!! $news->news_description !!}

                            </div><!-- End .entry-content -->

                        </div><!-- End .entry-body -->

                    </article><!-- End .entry -->

                    

                   

                       

                  
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@endsection
