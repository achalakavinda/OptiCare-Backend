@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')

    {{--<!-- Default box -->--}}
    {{--<div class="box">--}}
    {{--<div class="box-header with-border">--}}
    {{--<h3 class="box-title">Edit Status</h3>--}}
    {{--</div>--}}
    {{--@include('admin.widgets.header-widgets')--}}
    {{--<!-- /.box-body -->--}}
    {{--</div>--}}
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row-xs-12">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                    {{--<a href="{{route('check-up.create')}}" class="btn btn-sm btn-danger">New Check up <i class="fa fa-plus-square"></i></a>--}}

                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Optician ID</th>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
                            <th>date</th>
                            <th>type</th>
                            <th>check-up method</th>
                            <th>status</th>
                            <th>note</th>
                            <th>Created at </th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($chekups)

                            @foreach($chekups as $chekup)
                                <tr>
                                    <td>{!!$chekup->id !!}</td>
                                    <td>{!!$chekup->optician_id !!}</td>
                                    <td>{!!$chekup->patient_id!!}</td>
                                    <td>{!!$chekup->patient_name!!}</td>
                                    <td>{!!$chekup->date!!}</td>
                                    <td>{!!$chekup->type!!}</td>
                                    <td>{!!$chekup->isMobile == 1 ? 'mobile' : 'other'!!}</td>
                                    <td>
                                        <a href ="user/{{$chekup->id}}/check-up">
                                            {!!$chekup->status!!}</a>

                                    </td>
                                    <td>{!!$chekup->note!!}</td>
                                    <td>{!!$chekup->created_at!!}</td>
                                </tr>
                            @endforeach
                        @endif
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