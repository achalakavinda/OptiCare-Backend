@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')

    <!-- Default box -->
    {{--<div class="box">--}}
        {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">Dashboard</h3>--}}
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
                            <th>date</th>
                            <th>type</th>
                            <th>Pass Status</th>
                            <th>Check-up status</th>
                            <th>Appointment status</th>
                            <th>Score</th>
                            <th>Created at </th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($items)

                            @foreach($items as $item)
                                <tr>
                                    <td>{!! $item->id !!}</td>
                                    {{--<td>--}}
                                    {{--@foreach($images as $image)--}}
                                    {{--<img height="30"  src="{{'/images/'.$image->image ? '/images/'.$image->image : '/images/No_image_available.svg'}}">--}}

                                    {{--@endforeach--}}
                                    {{--</td>--}}
                                    <?php
                                    $optician_name = null;
                                    $patient_name = null;

                                    $optician_name = \App\User::find($item->optician_id) ;
                                    $patient_name = \App\User::find($item->patient_id) ;

                                    if($optician_name){
                                        $optician_name = $optician_name->name;
                                    }

                                    if($patient_name){
                                        $patient_name = $patient_name->name;
                                    }

                                    ?>

                                    <td>{!! $optician_name !!}</td>
                                    <td>{!! $patient_name  !!}</td>
                                    <td>{!! $item->date!!}</td>
                                    <td>{!! $item->type!!}</td>
                                    <td>{!! $item->isPass == 1 ? 'Pass' : 'Failed'!!}</td>
                                    <td>{!! $item->isCheckupCreated == 1 ? 'Created' : 'Not created'!!}</td>
                                    <td>{!! $item->isAppointmentCreated == 1 ? 'Created' : 'Not created'!!}</td>
                                    <td>{!! $item->score!!}</td>
                                    <td>{!! $item->created_at!!}</td>
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