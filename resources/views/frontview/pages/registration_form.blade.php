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
            <h2>Registration Form</h2>
            <ol>
              <li><a href="{{ route('homepage') }}">Home</a></li>
              <li>Register</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container">

          {{-- <div>
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
          </div> --}}

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

            <div class="col-lg- mt-5 mt-lg-0">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

              <form action="" method="" role="form" id="add_register_form" class="php-email-form">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="my-2 text-dark">Personal Information:</h4>
                    </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Full Name:<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" >
                    <div class="nameError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Father Name:<input type="text" name="father_name" id="father_name" class="form-control" placeholder="Enter Father Name" >
                    <div class="father_nameError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Mother Name:<input type="text" name="mother_name" id="mother_name" class="form-control" placeholder="Enter Mother Name" >
                    <div class="mother_nameError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Spouse Name:<input type="text" name="spouse_name" id="spouse_name" class="form-control" placeholder="Enter Spouse Name" >
                    <div class="spouse_nameError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Date of Birth:<input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="Enter Your Birth Date" >
                    <div class="birth_dateError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Blood Group:<select class="form-select mb-2" aria-label="Default select example" name="blood_group" id="blood_group" >
                        <option disabled selected >Please Select Your Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    <div class="blood_groupError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Nationality:<input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter Your Nationality" >
                    <div class="nationalityError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    NID:<input type="number" name="national_id" id="national_id" class="form-control" placeholder="Enter Your National ID No." >
                    <div class="national_idError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Religion:<input type="text" name="religion" id="religion" class="form-control" placeholder="Enter Religion" >
                    <div class="religionError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Phone:<input type="number" name="contact" id="contact" class="form-control" placeholder="Enter Phone Number" >
                    <div class="contactError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Email:<input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email Address" >
                    <div class="emailError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Photo:<input type="file" name="image" id="image" class="form-control" placeholder="Your Image" >
                    <div class="imageError text-danger errors d-none"></div>
                  </div>


                  <div class="col-lg-12">
                    <h4 class="my-2 text-dark">Address(Permanent):</h4>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    District:<select class="form-select mb-3" aria-label="Default select example" name="district" id="district" >
                        {{-- <option>Please Select the District</option> --}}
                        <option value="Dhaka" selected>Dhaka</option>
                    </select>
                    <div class="districtError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Upzila/Thana:<select class="form-select mb-3" aria-label="Default select example" name="thana_id" id="thana_id" >
                        <option disabled selected>Please Select the Upzila</option>
                        <option value="1">Nawabganj</option>
                        <option value="3">Dohar</option>
                        {{-- @foreach ($thanas as $thana)
                            <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                        @endforeach --}}
                    </select>
                    <div class="thana_idError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Union:<select class="form-select mb-3" aria-label="Default select example" name="union_id" id="union_id" >
                        <option disabled selected>Please Select the Union</option>
                        {{-- @foreach ($unions as $union)
                            <option value="{{ $union->id }}">{{ $union->name }}</option>
                        @endforeach --}}
                    </select>
                    <div class="union_idError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Village:<select class="form-select mb-3" aria-label="Default select example" name="village_id" id="village_id" >
                        <option disabled selected>Please Select the Village</option>
                        {{-- @foreach ($villages as $village)
                            <option value="{{ $village->id }}">{{ $village->name }}</option>
                        @endforeach --}}
                    </select>
                    <div class="village_idError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Post Office:<input type="text" name="post_office" id="post_office" class="form-control" placeholder="Enter Post Office" >
                    <div class="post_officeError text-danger errors d-none"></div>
                  </div>
                  <div class="col-lg-12">
                    <h4 class="my-2 text-dark">Address(Office):</h4>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Designation:<select class="form-select mb-3" aria-label="Default select example" name="designation_id" id="designation_id" >
                        <option disabled selected>Please Select the Designation</option>
                        @foreach ($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                        @endforeach
                    </select>
                    <div class="designation_idError text-danger errors d-none"></div>
                  </div>
                  {{-- <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="text" class="form-control" name="district" id="district" placeholder="Your District" required>
                  </div> --}}
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Office/Branch:<input type="text" name="branch" id="branch" class="form-control" placeholder=" Enter Office or Branch" >
                    <div class="branchError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Bank Name:<input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name" >
                    <div class="bank_nameError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Division/Section:<input type="text" name="section" id="section" class="form-control" placeholder="Enter Division or Section" >
                    <div class="sectionError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Present Address:<input type="text" name="present_address" id="present_address" class="form-control" placeholder="Enter Present Address" >
                    <div class="present_addressError text-danger errors d-none"></div>
                  </div>
                  <div class="col-md-3 form-group mt-3 mt-md-0">
                    Facebook ID:<input type="text" name="facebook_id" id="facebook_id" class="form-control" placeholder="Enter Your Facebook ID" >
                    <div class="facebook_idError text-danger errors d-none"></div>
                  </div>
                  {{-- <div class="col-md-12 form-group mt-3 mt-md-0">
                    Present Address:<input type="text" name="present_address" id="present_address" class="form-control" placeholder="Present Address" >
                    <div class="present_addressError text-danger errors d-none"></div>
                  </div> --}}
                </div>
                <div class="text-center mt-2"><button type="submit" class="add_jobSeeker_btn">Register</button></div>
              </form>

            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
@section('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript">
        // $("#district_id").change(function () {
        //     let district = $("#district_id").val();
        //     // alert(district);
        //     // Initiate District Field Options
        //     $("#thana_id").html();
        //     let option = "";

        //     $.get("http://127.0.0.1:8000/get-thanas/" + district, function ( data ) {
        //         data = JSON.parse( data );
        //         // console.log(data);
        //         data.forEach( function ( element ) {
        //             option += "<option value='" + element.id + "'>" + element.name + "</option>";
        //         });
        //         $("#thana_id").html( option );
        //     });
        // });

        $("#thana_id").click(function () {
            let thana = $("#thana_id").val();
            // alert(thana);
            // Initiate Union Field Options
            $("#union_id").html();
            let option = "";

            $.get("http://127.0.0.1:8000/get-unions/" + thana, function ( data ) {
                data = JSON.parse( data );
                // console.log(data);
                data.forEach( function ( element ) {
                    option += "<option value='" + element.id + "'>" + element.name + "</option>";
                });
                $("#union_id").html( option );
            });
        });

        $("#union_id").click(function () {
            let union = $("#union_id").val();
            // alert(thana);
            // Initiate Union Field Options
            $("#village_id").html();
            let option = "";

            $.get("http://127.0.0.1:8000/get-villages/" + union, function ( data ) {
                data = JSON.parse( data );
                // console.log(data);
                data.forEach( function ( element ) {
                    option += "<option value='" + element.id + "'>" + element.name + "</option>";
                });
                $("#village_id").html( option );
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            //Add data ajax request
            $(document).on('submit', '#add_register_form', function (e) {
                e.preventDefault();
                let fd = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: "{{ route('submit.register.form') }}",
                    data: fd,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (res) {
                        console.log(res);
                        if (res.status == 400) {
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');

                            $('.nameError').text(res.errors.name);
                            $('.father_nameError').text(res.errors.father_name);
                            $('.mother_nameError').text(res.errors.mother_name);
                            $('.spouse_nameError').text(res.errors.spouse_name);
                            $('.birth_dateError').text(res.errors.birth_date);
                            $('.blood_groupError').text(res.errors.blood_group);
                            $('.nationalityError').text(res.errors.nationality);
                            $('.national_idError').text(res.errors.national_id);
                            $('.facebook_idError').text(res.errors.facebook_id);
                            $('.religionError').text(res.errors.religion);
                            $('.contactError').text(res.errors.contact);
                            $('.emailError').text(res.errors.email);
                            $('.imageError').text(res.errors.image);
                            $('.districtError').text(res.errors.district);
                            $('.thana_idError').text(res.errors.thana_id);
                            $('.union_idError').text(res.errors.union_id);
                            $('.village_idError').text(res.errors.village_id);
                            $('.post_officeError').text(res.errors.post_office);
                            $('.designation_idError').text(res.errors.designation_id);
                            $('.branchError').text(res.errors.branch);
                            $('.bank_nameError').text(res.errors.bank_name);
                            $('.sectionError').text(res.errors.section);
                            $('.present_addressError').text(res.errors.present_address);
                        } else {
                            $('#add_register_form')[0].reset();
                            $('.errors').html('');
                            $('.errors').removeClass('d-none');
                            // $('.table').load(location.href+' .table');

                            Command: toastr["success"]("Registration!", "Successfully")
                                toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
