
@extends('layouts.master')
@section('title', 'Comitee Management')



@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row mb-2 -->
        </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h5 class="m-0"><strong><i class="fas fa-clipboard-list"></i> Comitee Management</strong></h5>
                        </div>
                        <div class="card-body">
                            <input type="hidden" id="member_id">

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label" >Comitee </label>
                            <select class="selectpicker form-control" data-live-search="true" id="comitee">
                                <option  disabled selected>plesse select</option>
                                <option value="Nawabganj">Nawabganj</option>
                                <option value="Dohar">Dohar</option>
                                <option value="Central">Central</option>

                                <!-- Add more years as needed -->
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="year1">Start Year:</label>
                            <input type="text" class="form-control" id="year1" placeholder="Enter start year">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="year2">End Year:</label>

                            <input type="text" class="form-control" id="year2" placeholder="Enter end year">
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-md-4">
                            <label class="form-label" for="yearSelector">Select  Member :</label>
                            <select class="selectpicker form-control" data-live-search="true" id="bankuserSelector">
                            <option disabled selected>please selecta value</option>

                            @foreach($data as $datas)
                                <option value={{$datas->id}}>{{$datas->name}}</option>
                                @endforeach

                                <!-- Add more years as needed -->
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" >Designation</label>
                            <select class="selectpicker form-control" data-live-search="true" id="designation">
                                <option disabled selected>plesse select</option>
                                <option value="President">President</option>
                                <option value="Secretary">Secretary</option>
                                <option value="Bank Manager">Bank Manager</option>
                                <option value="Assistent Bank Manager">Assistent Bank Manager</option>
                                <option value="Cash Manager">Cash Manager</option>
                                <option value="Trainee Assistent Manager">Trainee Assistent Manager</option>


                            </select>

                        </div>
                        <div class="col-md-2">
                            <div class="form-check mt-4 pt-2">
                                <input class="form-check-input " type="checkbox" value="" id="check" >
                                <label class="form-label" for="flexCheckChecked">
                                  Current Comitee
                                </label>
                              </div>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary mt-4 pb-2 pt-1" id="addtotable">Add</button>

                        </div>
                    </div>








                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>NID</th>
                                        <th>Designation</th>
                                        <th>Bank Name</th>
                                        <th>Committee Designation</th>
                                        <th>Form</th>
                                        <th>To</th>
                                        <th>Comitee</th>
                                        <th class="hidden">check</th>
                                        <th class="hidden">Member_ID</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">

                                    <!-- Add more rows as needed -->
                                </tbody>
                            </table>
                        </div>
                        <button id="submit" class="btn btn-success">Submit </button>
                    </div>


                </div> <!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div> <!-- container-fluid -->
    </div> <!-- /.content -->
</div> <!-- /.content-wrapper -->
</div>




@endsection

@section('script')
<script>
$(document).ready(function () {
        var bankuser;
        var year2;
        var year1;
        var comitee_des;
        var comitee;
        var designation

    $('#bankuserSelector').change(function (e) {
        e.preventDefault();
        let bankuser = $('#bankuserSelector').val();


        $.ajax({
            type: "get",
            url: "bankuser-info",
            data:{bankuser:bankuser},
            success: function (response) {
                if (response.status === 200) {
                    // console.log(response)
                    let responses=response.data;

                    name= responses.name;
                    nid= responses.nid;
                    mobile= responses.contact;
                    id= responses.designation_id;
                    $.ajax({
                        type: "GET",
                        url: "/designation-get/"+id,
                        success: function (response) {
                            console.log(response)
                            designation = response.designation;

                        }
                    });
                    bank= responses.bank_name;
                    member_id= responses.id


                }


            }
        });

    });
    $('#addtotable').click(function (e) {
                    e.preventDefault();
                    var year2=  $('#year2').val();
                    var year1=  $('#year1').val();
                    // console.log(year1)
                    // console.log(year2)
                    var comitee_des=  $('#designation').val();
                    var comitee=  $('#comitee').val();
                    let bankuser = $('#bankuserSelector').val();
                    let checkbox = document.getElementById('check');

                    // Check if the checkbox is checked
                    let check = checkbox.checked ? 1 : 0;



        if (year2 !== '' && year1 !== '' && comitee_des !== null && comitee !== null && bankuser!==null) {
                    $('#tbody').append(`
                <tr>
                    <td>${name}</td>
                    <td>${mobile}</td>
                    <td>${nid}</td>
                    <td>${designation}</td>
                    <td>${bank}</td>
                    <td>${comitee_des}</td>
                    <td>${year1}</td>
                    <td>${year2}</td>
                    <td>${comitee}</td>
                    <td class="hidden">${check}</td>
                    <td class="hidden">${member_id}</td>


                </tr>`);

                // $('#bankuserSelector').val('');
                // $('#year2').val('');
                // $('#year1').val('');
                $('#bankuserSelector').selectpicker('val', '');
                $('#designation').selectpicker('val', '');
                // $('#comitee').selectpicker('val', '');
                name = null;
                nid = null;
                mobile = null;
                designation = null;
                bank = null;
            }
            else
            {

                $.notify('all feilds must be filled', 'danger')

            }


                });
});

</script>
<script>

    $('#submit').click(function (e) {
        e.preventDefault();
        let data= {};

        var datas=[];

        $('.table tbody > tr').each(function () {
        const designation = {};
        designation["name"] = $(this).find("td:eq(0)").text();
        designation["contact"] = $(this).find("td:eq(1)").text();
        designation["nid"] = $(this).find("td:eq(2)").text();
        designation["designation"] = $(this).find("td:eq(3)").text();
        designation["bank"] = $(this).find("td:eq(4)").text();
        designation["comitee_des"] = $(this).find("td:eq(5)").text();
        designation["year1"] = $(this).find("td:eq(6)").text();
        designation["year2"] = $(this).find("td:eq(7)").text();
        designation["comitee"] = $(this).find("td:eq(8)").text();
        designation["check"] = $(this).find("td:eq(9)").text();
        designation["member_id"] = $(this).find("td:eq(10)").text();

        datas.push(designation);
            });

        data["designations"]=datas;
        // console.log(data)

            $.ajax({
                type: "post",
                url: "\store_designation",
                data: JSON.stringify(data),
                dataType: "json",
                contentType: "application/json",

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                     $.notify(response.messsege, 'success')
                    $(location).attr('href','/comitee-designation-list');
                }
            });

    });
</script>



@endsection










