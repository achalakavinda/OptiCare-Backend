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
                                    <h3 class="box-title">Edit Product Type : {{$product->name}}</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->

                                {!! Form::model($product,['method' =>'PATCH','action'=>['ProductTypeController@update',$product->id],'class'=>'form-horizontal','id'=>'Form','files'=>true]) !!}

                                    @include('error.error')
                                    @include('admin.interfaces.product.productType._partials.edit')
                                {!! Form::close() !!}


                                {!! Form::open (['method' =>'DELETE','action'=>['ProductTypeController@destroy',$product->id]]) !!}

                                <div class="box-footer">
                                        {!! Form::submit ('Delete',['class'=>'btn btn-danger col-sm-6'])!!}
                                        {!! Form::close() !!}
                                <div>



                            </div>
                    </div>      <!-- /.box -->
            <div>
    </div>

    <!-- /.row -->



@endsection