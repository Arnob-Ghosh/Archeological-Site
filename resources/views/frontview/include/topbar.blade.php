<!-- ======= Header ======= -->
{{-- <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <!-- Uncomment below if you prefer to use an image logo -->

        <nav id="navbar" class="navbar">
            <div class="me-auto">
                <a href="index.html" class="logo"><img src="{{ asset('frontview/img/museum11.png') }}" alt="" class="img-fluid"></a>
            </div>
            <ul class="ms-auto">
                <li><a href="{{ route('homepage') }}" class="active">Home</a></li>
                <li class="dropdown"><a href="#"><span>Council</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="about.html">Central Community</a></li>
                        <li><a href="team.html">Nababgonj Sub-Community</a></li>
                        <li><a href="testimonials.html">Duhar Sub-Community</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Member</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="about.html">Lifetime Member</a></li>
                        <li><a href="team.html">General Member</a></li>
                        <li><a href="testimonials.html">The ones we'have lost</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('jobSeeker.form') }}">Job Seeker</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li class="dropdown"><a href="#"><span>Document</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="">Register Form</a></li>
                    </ul>
                </li>
                <li>
                    <form action="" method="" class="d-flex">
                        <input type="search" class="form-control ms-3 mx-2" name="search_union_wise" placeholder="Search...">
                        <button type="submit" class="btn btn-danger">Search</button>
                    </form>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header> --}}
<!-- End Header -->

<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center opacity-75">
    <div class="container d-flex align-items-center">

        {{-- <h1 class="logo me-auto"><a href="{{ route('homepage') }}">DNBA</a></h1> --}}
        <h1 class="logo me-auto mt-1"><a href="{{ route('homepage') }}" class="logo"><img src="{{ asset('frontview/img/logo.png') }}" alt="" class="img-fluid"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
            <li><a href="{{ route('homepage') }}" class="active">Home</a></li>
            <li class="dropdown"><a href="#"><span>Council</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('centralCommunity') }}">Central Community</a></li>
                    <li><a href="{{ route('nawabganjSubComitee') }}">Nababgonj Sub-Community</a></li>
                    <li><a href="{{ route('doharSubComitee') }}">Duhar Sub-Community</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Member</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('lifetimeMember') }}">Lifetime Member</a></li>
                    <li><a href="{{ route('generalMember') }}">General Member</a></li>
                    <li><a href="">The ones we'have lost</a></li>
                    <li><a href="{{ route('searchPage') }}">Find Member</a></li>
                </ul>
            </li>
            <li><a href="{{ route('jobSeeker.form') }}">Job Seeker</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li class="dropdown"><a href="#"><span>Document</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route('register.form') }}">Register Form</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Account</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="about.html">Total Income</a></li>
                    {{-- <li><a href="team.html">General Member</a></li> --}}
                    {{-- <li><a href="testimonials.html">The ones we'have lost</a></li> --}}
                </ul>
            </li>
            {{-- <li>
                <form action="{{ route('findMember') }}" method="GET" class="d-flex">
                    <input type="search" class="form-control ms-3 mx-2" name="search" placeholder="Name/Phone...">
                    <div class="col-md-3 form-group mt-3 mt-md-0">
                        <select class="form-select" name="search" id="thana_id" aria-label="Default select example" required>
                            <option disabled selected>Select to The Thana/Upzila</option>
                            <option value="3">Dohar</option>
                            <option value="1">Nawabganj</option>
                        </select>
                        <strong id="thana_error" class="form-text text-danger"></strong>
                    </div>
                    <button type="submit" class="btn btn-warning me-1">Search</button>
                </form>
            </li> --}}
            {{-- <li><a href="index.html" class="getstarted">Get Started</a></li> --}}
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

