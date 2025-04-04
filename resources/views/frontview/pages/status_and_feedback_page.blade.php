@extends('frontview.layout.template')

@section('page-css')

@endsection
@section('page-title')

@endsection
@section('body-content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

          <div class="d-flex justify-content-between align-items-center">
            <h2>Job Status & Feedback</h2>
            <ol>
              <li><a href="{{ route('homepage') }}">Home</a></li>
              <li>Feedback Page</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container">

          <div class="row mt-5">

            {{-- <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55s</p>
                </div>

              </div>

            </div> --}}

            <div class="col-lg-8 mt-5 mt-lg-0">

              <form action="{{ route('feedback.job.status') }}" method="POST" role="form" class="php-email-form">
                @csrf
                <input type="hidden" name="jobSeeker_id" id="jobSeeker_id" value="{{ $search_job_status->id }}">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label for="">Job ID</label>
                    <input type="number" name="job_id" class="form-control" id="job_id" value="{{ $search_job_status->job_id }}" readonly>
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="">Job Status</label>
                    <input type="text" name="status" class="form-control" id="status" value="{{ $search_job_status->status }}" readonly>
                  </div>
                </div>
                <div class="form-group mt-3">
                    <h6>Comment</h6>
                  <textarea class="form-control" name="comment" rows="5" readonly>{{ $search_job_status->comment }}</textarea>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="feedback" rows="5" placeholder="Your Feedback">Hello World</textarea>
                </div>
                {{-- <input type="submit" class="btn btn-primary" value="Send"> --}}
                <div class="text-center"><button type="submit">Feedback</button></div>
              </form>

            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
@section('page-script')

@endsection
