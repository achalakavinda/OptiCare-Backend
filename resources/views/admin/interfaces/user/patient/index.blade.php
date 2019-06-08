@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Dashboard</h3>
        </div>
    @include('admin.widgets.header-widgets')
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{route('patient.create')}}" class="btn btn-sm btn-danger">New <i class="fa fa-plus-square"></i></a>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Vision Report</th>
                            <th>Checkups</th>
                            <th>Test Summery reports</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patients as $patient)
                                <tr>
                                    <td>{!! $patient->id !!}</td>
                                    <td><img height="30"  src="{{$patient->avatar ? $patient->avatar->file : '/images/noImage.png'}}"> </td>
                                    <td>{!! $patient->name !!}</td>
                                    <td>{!! $patient->patients->contact_number !!}</td>
                                    <td>
                                        <a href="{!! url('user') !!}/{!! $patient->id !!}/vision"><i class="fa fa-file"></i></a>
                                    </td>
                                    <td>
                                    <a href="{!! url('user') !!}/{!! $patient->id !!}/checkup"><i class="fa fa-file"></i></a>
                                    </td>
                                    <td>
                                        <a href="user/{{$patient->id}}/test-summery"><i class="fa fa-file"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{route('patient.edit',$patient->patients->id)}}">View <i class="fa fa-paper-plane"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
<!-- /main section -->

@section('js')
    {!! Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}

    <script type="text/javascript">

        $(function () {
            $('#table').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            })
        })
    </script>

@endsection