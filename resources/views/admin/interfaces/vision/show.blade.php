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
                            <th>l_sphere</th>
                            <th>l_cyl</th>
                            <th>l_axis</th>
                            <th>l_add</th>
                            <th>r_sphere</th>
                            <th>r_cyl</th>
                            <th>r_axis</th>
                            <th>r_add</th>
                            <th>Created at </th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($visions)

                            @foreach($visions as $vision)
                                <tr>
                                    <td>{!!$vision->id !!}</td>
                                    {{--<td>{!!$vision->optician_id !!}</td>--}}
                                    {{--<td>{!!$vision->patient_id!!}</td>--}}
                                    {{--<td>{!!$vision->patient_name!!}</td>--}}
                                    <td>{!!$vision->l_sphere!!}</td>
                                    <td>{!!$vision->l_cyl!!}</td>
                                    <td>{!!$vision->l_axis!!}</td>
                                    <td>{!!$vision->l_add!!}</td>
                                    {{--<td>{!!$vision->l_p&b!!}</td>--}}
                                    <td>{!!$vision->r_sphere!!}</td>
                                    <td>{!!$vision->r_cyl!!}</td>
                                    <td>{!!$vision->r_axis!!}</td>
                                    <td>{!!$vision->r_add!!}</td>
                                    {{--<td>{!!$vision->r_p&b!!}</td>--}}
                                    <td>{!!$vision->created_at!!}</td>
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