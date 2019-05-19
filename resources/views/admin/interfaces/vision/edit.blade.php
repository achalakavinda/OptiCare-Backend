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

                    <div class="col-sm-9">
                        <!-- general form elements -->

                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit Information of {{$vision->id}}</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->

                                {!! Form::model($vision,['method' =>'PATCH','action'=>['VisionController@update',$vision->id],'class'=>'form-horizontal','id'=>'Form']) !!}

                                    @include('error.error')
                                    @include('admin.interfaces.vision._partials.edit')
                                {!! Form::close() !!}

                                {{--{!! Form::open (['method' =>'DELETE','action'=>['VisionController@destroy',$vision->id]]) !!}--}}
                                {{--<div class="form-group">--}}
                                    {{--{!! Form::submit ('Delete Product',['class'=>'btn btn-danger col-sm-5'])!!}--}}
                                {{--</div>--}}
                                {{--{!! Form::close() !!}--}}

                            </div>
                    </div>      <!-- /.box -->
            <div>
    </div>

    <!-- /.row -->



@endsection