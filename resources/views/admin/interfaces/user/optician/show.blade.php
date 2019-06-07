@extends('layouts.admin')

<!-- main header section -->

@section('main-content-header')



@endsection

@section('main-content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Profile
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="{{$opticians->user->avatar->file}}" alt="User profile picture">

                            <h3 class="profile-username text-center">{{$opticians->user->name}}</h3>

                            <p class="text-muted text-center">{{$opticians->shop_name}}</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Contact Number</b> <a class="pull-right">{{$opticians->contact_number}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="pull-right">{{$opticians->user->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Patients</b> <a class="pull-right">{{$patients}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Check-Ups</b> <a class="pull-right">{{$checkUps}}</a>
                                </li>

                            </ul>

                            <a href="{{route('optician.edit',$opticians->id)}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->

                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box">
                        <div class="box header ">
                            <h3><center>Patients</center></h3>
                        </div>


                            <div style="overflow: auto" class="box-body">
                                <table id="table" class="table table-responsive table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Avatar</th>
                                        <th>Name</th>
                                        <th>Contact Number</th>
                                        <th>Address</th>
                                        <th>Birthday</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($patientsDetails as $patientsDetails)
                                        <tr>
                                            <td>{!! $patientsDetails->id !!}</td>
                                            <td><img height="30"  src="{{$patientsDetails->user->avatar ? $patientsDetails->user->avatar->file : '/images/noImage.png'}}"> </td>
                                            <td>{!! $patientsDetails->user->name !!}</td>
                                            <td>{!! $patientsDetails->contact_number !!}</td>
                                            <td>{!! $patientsDetails->address !!}</td>
                                            <td>{!! $patientsDetails->birthday !!}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="box">
                            <div class="box-header">
                                <h3><center> Check-ups</center></h3>
                            </div>

                        <div style="overflow: auto" class="box-body">
                            <table id="table2" class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Optician </th>
                                    <th>Patient </th>
                                    <th>Type</th>
                                    <th>Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                @if($checkUpsDetails)

                                    @foreach($checkUpsDetails as $checkUpsDetail)
                                        <tr>
                                            <td>{!! $checkUpsDetail->id !!}</td>
                                            <td>{!! $checkUpsDetail->optician_name !!}</td>
                                            <td>{!! $checkUpsDetail->patient_name!!}</td>
                                            <td>{!! $checkUpsDetail->type!!}</td>
                                            <td>{!! $checkUpsDetail->status!!}</td>

                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- /.col -->
            </div>
            <!-- /.row -->


            </div>

        </section>
        <!-- /.content -->
    </div>



@endsection

@section('js')
    {!! Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">

        $(function () {
            $('#table').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            })
        })

        $(function () {
            $('#table2').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            })
        })

    </script>

@endsection

