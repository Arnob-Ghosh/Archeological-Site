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
          <h2>Central Community</h2>
          <ol>
            <li><a href="{{ route('homepage') }}">Home</a></li>
            <li><a href="">Central Community</a></li>
            {{-- <li>Blog Single</li> --}}
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="" class="">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-3">
                    @foreach ( App\Models\BankUser::where('designation_id', 5)->get() as $president )
                        <div class="card h-100">
                            <img src="{{ asset('images/user/' . $president->image) }}"  class="mx-auto d-block mt-4"  width="200px" alt="...">
                            <div class="card-body text-center">
                                <h6 class="card-text"><strong>Name:</strong> {{ $president->name }}</h6>
                                <h6 class="card-text"><strong>Designation:</strong> {{ $president->designation->designation }}</h6>
                                <h6 class="card-text"><strong>Mobile:</strong> +0{{ $president->contact }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-3">
                    @foreach ( App\Models\BankUser::where('designation_id', 6)->get() as $secretary )
                        <div class="card h-100">
                            <img src="{{ asset('images/user/' . $secretary->image) }}"  class="mx-auto d-block mt-4"  width="200px" alt="...">
                            <div class="card-body text-center">
                                <h6 class="card-text"><strong>Name:</strong> {{ $secretary->name }}</h6>
                                <h6 class="card-text"><strong>Designation:</strong> {{ $secretary->designation->designation }}</h6>
                                <h6 class="card-text"><strong>Mobile:</strong> +0{{ $secretary->contact }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-3"></div>
            </div> --}}
            <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
                @foreach ( $centralComitees as $centralComitee )
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('images/user/' . $centralComitee->bankUser->image) }}"  class="mx-auto d-block mt-4"  width="200px" alt="...">
                            <div class="card-body text-center">
                                <h6 class="card-text"><strong>Name:</strong> {{ $centralComitee->name }}</h6>
                                <h6 class="card-text"><strong>Designation:</strong> {{ $centralComitee->designation }}</h6>
                                <h6 class="card-text"><strong>Mobile:</strong> +{{ $centralComitee->mobile_no }}</h6>
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
