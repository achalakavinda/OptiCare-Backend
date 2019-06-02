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
                            <th>Checkups<i class="fa fa-paper-plane"></i></th>
                            <th>Test Summery reports<i class="fa fa-paper-plane"></i></th>
                            <th>View <i class="fa fa-paper-plane"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patients as $patient)
                                <tr>
                                    <td>{!! $patient->id !!}</td>
                                    <td><img height="30"  src="{{$patient->user->avatar ? $patient->user->avatar->file : '/images/noImage.png'}}"> </td>
                                    <td>{!! $patient->user->name !!}</td>
                                    <td>{!! $patient->contact_number !!}</td>
                                    <td>
                                        <a href="{{route('vision.show',$patient->id)}}"><i class="fa fa-paper-plane"></i></a>
                                    </td>
                                    <td>
                                    <a href="{{route('check-up.show',$patient->id)}}"><i class="fa fa-paper-plane"></i></a>
                                    </td>
                                    {{--<td>--}}
                                        {{--<a href="user/{{$patient->id}}/check-up"><i class="fa fa-paper-plane"></i></a>--}}
                                    {{--</td>--}}

                                    <td>
                                        <a href="user/{{$patient->id}}/test-summery"><i class="fa fa-paper-plane"></i></a>
                                    </td>

                                    <td>
                                        <a href="{{route('patient.edit',$patient->id)}}"><i class="fa fa-paper-plane"></i></a>
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