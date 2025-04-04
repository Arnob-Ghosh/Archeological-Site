@extends('layouts.master')
@section('title', 'Bank User List')



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

                    <div class="card">
                        <div class="card-header bg-light d-flex align-items-center">
                            <h5 class=" text-dark mb-0 flex-grow-1">Manage Bank User Information</h5>
                            <div class="flex-shrink-0">
                                <a href="{{ route('create.bankUser') }}" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#..">
                                    <i class="bi-plus-circle"> Add New Bank User</i>
                                </a>
                                <a href="{{ route('pending.bankUser') }}" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#..">
                                    <i class="bi-plus-circle"> Pending Bank User</i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body mt-2" id="show_all_bankUsers">
                          {{-- <h5 class="card-title">Bank User Information</h5> --}}
                          @if ($bankUsers->count() > 0)
                                <!-- Table with stripped rows -->
                                <div class="">
                                    <table class="table table-bordered table-striped datatable" id="myTable">
                                        <thead>
                                        <tr>
                                            <th scope="col">#ID.</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Father Name</th>
                                            <th scope="col">Mother Name</th>
                                            <th scope="col">Spouse Name</th>
                                            <th scope="col">Date of Birth</th>
                                            <th scope="col">Bank Name</th>
                                            <th scope="col">Branch/Office</th>
                                            <th scope="col">Division/Section</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Blood Group</th>
                                            <th scope="col">Nationality</th>
                                            <th scope="col">NID</th>
                                            <th scope="col">Facebook ID</th>
                                            <th scope="col">Religion</th>
                                            <th scope="col">District</th>
                                            <th scope="col">Upzila</th>
                                            <th scope="col">Union</th>
                                            <th scope="col">Village</th>
                                            <th scope="col">Post Office</th>
                                            <th scope="col">Present Address</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $bankUsers as $key => $bankUser )
                                                <tr>
                                                    <th scope="row">{{ ++$key}}</th>
                                                    <td>
                                                        @if ( !is_null($bankUser->image) )
                                                            <img src="{{ asset('images/user/' . $bankUser->image ) }}" alt="" width="35">
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                    <td>{{ $bankUser->name }}</td>
                                                    <td>{{ $bankUser->email }}</td>
                                                    <td>{{ $bankUser->contact }}</td>
                                                    <td>{{ $bankUser->father_name }}</td>
                                                    <td>{{ $bankUser->mother_name }}</td>
                                                    <td>{{ $bankUser->spouse_name }}</td>
                                                    <td>{{ $bankUser->birth_date }}</td>
                                                    <td>{{ $bankUser->bank_name }}</td>
                                                    <td>{{ $bankUser->branch }}</td>
                                                    <td>{{ $bankUser->section }}</td>
                                                    <td>{{ $bankUser->designation_id }}</td>
                                                    <td>{{ $bankUser->blood_group }}</td>
                                                    <td>{{ $bankUser->nationality }}</td>
                                                    <td>{{ $bankUser->nid }}</td>
                                                    <td>{{ $bankUser->facebook_id }}</td>
                                                    <td>{{ $bankUser->religion }}</td>
                                                    <td>{{ $bankUser->district }}</td>
                                                    <td>{{ $bankUser->thana->name }}</td>
                                                    <td>{{ $bankUser->union->name }}</td>
                                                    <td>{{ $bankUser->village->name }}</td>
                                                    <td>{{ $bankUser->post_office }}</td>
                                                    <td>{{ $bankUser->present_address }}</td>
                                                    <td>
                                                        @if( $bankUser->status == 1 )
                                                            <span class="badge bg-primary">Active</span>
                                                        @elseif( $bankUser->status == 0 )
                                                            <span class="badge bg-warning">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="" id="{{ $bankUser->id }}" class="btn btn-outline-success btn-sm mb-2 editIcon" data-bs-toggle="modal" data-bs-target="#editBankUserModal">
                                                            <i class="fas fa-edit" style="color: green"></i>
                                                        </a>
                                                        <a href="" id="{{ $bankUser->id }}" class="btn btn-outline-danger btn-sm deleteIcon"><i class="fas fa-trash" style="color: red"></i></a>
                                                        {{-- <a href="" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteBankUser{{ $bankUser->id }}" >
                                                            <i class="fas fa-trash" style="color: red"></i>
                                                        </a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Table with stripped rows -->
                          @else
                            <div class="alert alert-info" role="alert">
                                <strong> Sorry ! </strong> No Found in <b>Any Member</b>.
                            </div>

                          @endif

                          <!-- Table with stripped rows -->
                          {{-- <table class="table table-responsive table-striped datatable ">
                            <thead>
                              <tr>
                                <th scope="col">#Sl.</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Blood Group</th>
                                <th scope="col">Present Address</th>
                                <th scope="col">Permanet Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Avater</td>
                                    <td>Mister Bean</td>
                                    <td>bean@fun.com</td>
                                    <td>20160525</td>
                                    <td>Switch Bank</td>
                                    <td>Cash Officer</td>
                                    <td>O+</td>
                                    <td>Washington, DC</td>
                                    <td>California, H#102 Road#11</td>
                                    <td>Active</td>
                                    <td>
                                        <a href="" class="btn btn-outline-success btn-sm mb-2"><i class="ri-edit-box-fill" style="color: green"></i></a>
                                        <a href="" class="btn btn-outline-danger btn-sm"><i class="ri-delete-bin-fill" style="color: red"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                          </table> --}}
                          <!-- End Table with stripped rows -->

                        </div>
                      </div> <!-- Card -->

                </div> <!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div> <!-- container-fluid -->
    </div> <!-- /.content -->
</div> <!-- /.content-wrapper -->

@include('backend.bankUser.edit_modal_page')

@endsection

@include('backend.bankUser.bankUser_js')
