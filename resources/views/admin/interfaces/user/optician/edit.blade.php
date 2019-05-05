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

                    <div class="col-sm-3">

                        <img src="{{$optician->user->avatar ? $optician->user->avatar->file : '/images/No_image_available.svg'}}" alt="" class="img-responsive">
                    </div>

                    <div class="col-sm-9">
                        <!-- general form elements -->

                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit Information of {{$optician->shop_name}}</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->

                                {!! Form::model($optician,['method' =>'PATCH','action'=>['AdminOpticianController@update',$optician->id],'class'=>'form-horizontal','id'=>'Form','files'=>true]) !!}

                                    @include('error.error')
                                    @include('admin.interfaces.user.optician._partials.edit')
                                {!! Form::close() !!}

                            </div>
                    </div>      <!-- /.box -->
            <div>
    </div>

    <!-- /.row -->



@endsection