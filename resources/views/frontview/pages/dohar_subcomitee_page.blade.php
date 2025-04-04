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
          <h2>Dohar Sub-Community</h2>
          <ol>
            <li><a href="{{ route('homepage') }}">Home</a></li>
            <li><a href="">Community</a></li>
            {{-- <li>Blog Single</li> --}}
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="" class="">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
                @foreach ( $doharSubComitees as $doharSubComitee )
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('images/user/' . $doharSubComitee->bankUser->image) }}"  class="mx-auto d-block mt-4"  width="200px" alt="...">
                            <div class="card-body text-center">
                                <h6 class="card-text"><strong>Name:</strong> {{ $doharSubComitee->name }}</h6>
                                <h6 class="card-text"><strong>Designation:</strong> {{ $doharSubComitee->designation }}</h6>
                                <h6 class="card-text"><strong>Mobile:</strong> +{{ $doharSubComitee->mobile_no }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ======= Blog Single Section ======= -->
    <!-- End Blog Single Section -->

  </main><!-- End #main -->

@endsection
@section('page-script')

@endsection
