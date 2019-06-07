@extends('layouts.admin')

@section('style')
    {!! Html::style('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
@endsection

<!-- main header section -->
@section('main-content-header')

    <!-- Default box -->
    <div class="box">
        <div style="padding: 10px" class="row">

            <div class="box-header with-border">
                <h3 class="box-title">Dashboard</h3>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="#">
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Users</span>
                            <span class="info-box-number"></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                                        # of Users : <?php echo \App\User::get()->count() ?>
                                    </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div><!--/.col -->


            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="#">
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">CheckUps</span>
                            <span class="info-box-number"></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 100%"></div>
                            </div>
                            <span class="progress-description">
                                        # of Checkups : <?php echo \App\Models\CheckUp::get()->count() ?>
                                    </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div><!--/.col -->


        </div>
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
                    <a href="{{ url('/user/create') }}" class="btn btn-sm btn-danger">New <i class="fa fa-plus-square"></i></a>
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>View <i class="fa fa-paper-plane"></i></th>
                        </tr>
                        </thead>
                        <tbody>

                        @if($Users)
                            @foreach($Users as $user)
                                <tr>
                                    <td>{!! $user->id !!}
                                    <td>{!! $user->name !!}</td>
                                    <td>{!! $user->contact !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>
                                        <a href="{!! url('/users/') !!}/{!! $user->id !!}"><i class="fa fa-paper-plane"></i></a>
                                    </td>
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