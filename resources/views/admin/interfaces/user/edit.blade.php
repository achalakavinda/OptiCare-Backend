@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Admin</h3>
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

                    <div class="col-sm-3">

                        <img src="{{$user->avatar ? $user->avatar->file : '/images/No_image_available.svg'}}" alt="" class="img-responsive">
                    </div>

                    <div class="col-sm-9">
                        <!-- general form elements -->

                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit User</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->

                                {!! Form::model($user,['method' =>'PATCH','action'=>['UserController@update',$user->id],'class'=>'form-horizontal','id'=>'Form','files'=>true]) !!}

                                    @include('error.error')
                                    @include('admin.interfaces.user._partials.edit')
                                {!! Form::close() !!}

                                <div class="box-body">

                                        {!! Form::open (['method' =>'DELETE','action'=>['UserController@destroy',$user->id]]) !!}
                                            <div class="form-group">
                                                {!! Form::submit ('Delete User',['class'=>'btn btn-danger col-sm-5'])!!}
                                            </div>
                                        {!! Form::close() !!}
                                </div>
                            </div>
                    </div>      <!-- /.box -->
            <div>
    </div>

    <!-- /.row -->



@endsection