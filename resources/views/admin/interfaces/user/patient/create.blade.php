@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">User</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/') }}" class="btn btn-success">Dashboard</a>
            <a href="{{ url('/patient') }}" class="btn btn-success">optician</a>
            <a href="{{ url('/patient/create') }}" class="btn btn-success">New optician</a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Patient Registration</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['method' =>'POST','action'=>'OpticianPatientController@store','class'=>'form-horizontal','id'=>'Form','files'=>true]) !!}
                @include('error.error')
                @include('admin.interfaces.user.patient._partials.create')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('js')
    @include('error.swal')
@endsection