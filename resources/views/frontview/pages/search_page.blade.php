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
          <h2>Search People</h2>
          <ol>
            <li><a href="{{ route('homepage') }}">Home</a></li>
            <li><a href="">Search Page</a></li>
            {{-- <li>Blog Single</li> --}}
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="" class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-info opacity-75">
                            <form action="" method="" id="searchForm" class="d-flex">
                                <div class="col-md-3 form-group mt-3 mx-1 mt-md-0">
                                    <select class="form-select" name="thana" id="thana_id" aria-label="Default select example" required>
                                        <option disabled selected>Select to The Thana/Upzila</option>
                                        <option value="3">Dohar</option>
                                        <option value="1">Nawabganj</option>
                                    </select>
                                    <strong id="thana_error" class="form-text text-danger"></strong>
                                </div>
                                <div class="col-md-3 form-group mt-3 mx-1 mt-md-0">
                                    <select class="form-select" name="union" id="union_id" aria-label="Default select example" required>
                                        <option disabled selected>Select to The Union</option>
                                    </select>
                                    <strong id="union_error" class="form-text text-danger"></strong>
                                </div>
                                <button type="submit" class="btn btn-warning me-1">Submit</button>
                            </form>
                            {{-- <form action="{{ route('findMember') }}" method="GET" role="form" id="searchForm" class="php-email-form">
                                <div class="row">
                                    <div class="col-md-3 form-group mt-3 mt-md-0">
                                        <select class="form-select" name="search" id="thana_id" aria-label="Default select example" required>
                                            <option disabled selected>Select to The Thana/Upzila</option>
                                            <option value="3">Dohar</option>
                                            <option value="1">Nawabganj</option>
                                        </select>
                                        <strong id="thana_error" class="form-text text-danger"></strong>
                                    </div>
                                    <div class="col-md-3 form-group mt-3 mt-md-0">
                                        <select class="form-select" name="union" id="union_id" aria-label="Default select example" required>
                                            <option disabled selected>Select to The Union</option>
                                        </select>
                                        <strong id="union_error" class="form-text text-danger"></strong>
                                    </div>
                                    <div class="col-md-3 form-group mt-3 mt-md-0">
                                        <button type="submit" class="mt-1 bg-danger text-white opacity-100">Submit</button>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    {{-- <th scope="col">#SL</th> --}}
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone No.</th>
                                    <th scope="col">Bank Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Branch</th>
                                    <th scope="col">Section</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <img src="{{ asset(images/user) }}" alt="" class="img-fluid"> --}}

    <!-- ======= Blog Single Section ======= -->
    <!-- End Blog Single Section -->

  </main><!-- End #main -->

@endsection
@section('page-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{-- <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script> --}}
<script>
    $(document).ready(function () {
        $("#thana_id").click(function () {
            let thana = $("#thana_id").val();
            // alert(thana);
            // console.log(thana);
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

        $(document).on('submit', '#searchForm', function (e) {
            e.preventDefault();
            let thana     = $('#thana_id').val();
            let union     = $('#union_id').val();
            $.ajax({
                type: "GET",
                url: "{{ route('findMember') }}",
                data: {
                    thana: thana,
                    union: union,
                    // _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    // console.log(res.members);
                    $('#tbody').empty();
                    if ( res.members.length > 0 ) {
                        $.each(res.members, function(key,item){
                            $('#tbody').append(
                                "<tr>"+
                                    // "<td>"+ res.id +"</td>"+
                                    "<td><img src='{{ asset("images/user") }}/"+ item.image +" ' width='40px' class='img-fluid'></td>"+
                                    "<td>"+ item.name +"</td>"+
                                    "<td>"+ item.email +"</td>"+
                                    "<td>"+ item.contact +"</td>"+
                                    "<td>"+ item.bank_name +"</td>"+
                                    "<td>"+ item.designation_id +"</td>"+
                                    "<td>"+ item.branch +"</td>"+
                                    "<td>"+ item.section +"</td>"
                                +"</tr>"
                            );
                        });
                    } else {
                        // Command: toastr["success"]("No Found!", "Member")
                        //     toastr.options = {
                        //     "closeButton": true,
                        //     "debug": false,
                        //     "newestOnTop": false,
                        //     "progressBar": true,
                        //     "positionClass": "toast-top-right",
                        //     "preventDuplicates": false,
                        //     "onclick": null,
                        //     "showDuration": "300",
                        //     "hideDuration": "1000",
                        //     "timeOut": "5000",
                        //     "extendedTimeOut": "1000",
                        //     "showEasing": "swing",
                        //     "hideEasing": "linear",
                        //     "showMethod": "fadeIn",
                        //     "hideMethod": "fadeOut"
                        // }
                        $('#tbody').html(
                            '<strong class="text-center text-danger my-3">No Member Found</strong>'
                        );
                    }

                },
            });
        });
    });
</script>
@endsection
