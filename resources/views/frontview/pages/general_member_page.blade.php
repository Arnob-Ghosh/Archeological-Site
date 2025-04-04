@extends('frontview.layout.template')

@section('page-css')

@endsection
@section('page-title')

@endsection
@section('body-content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>General Member</h2>
          <ol>
            <li><a href="{{ route('homepage') }}">Home</a></li>
            <li><a href="">General Member</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

     <!-- ======= Team Section ======= -->
     <section id="team" class="team section-bg">
        <div class="container">
          <div class="section-title">
            <h2>DNBA</h2>
            <p>Our General Member</p>
          </div>
            <div class="row">
                @foreach ( $generalMembers as $generalMember )
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="{{ asset('images/user/' . $generalMember->image) }}" class="img-fluid" alt=""></div>
                            <div class="member-info mt-4">
                                <h4>{{ $generalMember->name }}</h4>
                                <span>{{ $generalMember->designation_id }}</span>
                                <p>+{{ $generalMember->contact }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      </section><!-- End Team Section -->


  </main><!-- End #main -->

@endsection
@section('page-script')

@endsection
