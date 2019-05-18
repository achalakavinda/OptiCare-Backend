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
    <div class="row-xs-12">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{route('productType.index')}}" class="btn btn-sm btn-danger">Product Types <i class="fa fa-plus-square"></i></a>
                    <a href="{{route('product.create')}}" class="btn btn-sm btn-danger">New Product <i class="fa fa-plus-square"></i></a>
                    {{--<a href="{{route('type.edit',$type->id)}}" class="btn btn-sm btn-danger">Edit Product Type <i class="fa fa-plus-square"></i></a>--}}
                    {{--<a href="{{route('type.destroy',$type->id)}}" class="btn btn-sm btn-danger">Delete <i class="fa fa-plus-square"></i></a>--}}
                </div>
                <!-- /.box-header -->
                <div style="overflow: auto" class="box-body">
                    <table id="table" class="table table-responsive table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Product Images</th>
                            <th>Name</th>
                            <th>Product</th>
                            <th>View <i class="fa fa-paper-plane"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($products)

                            @foreach($products as $product)
                                <tr>
                                    <td>{!! $product->id !!}</td>
                                    <td>
                                        @foreach($images as $image)
                                            <img height="30"  src="{{'/images/'.$image->image ? '/images/'.$image->image : '/images/No_image_available.svg'}}">

                                        @endforeach
                                    </td>
                                    <td>{!! $product->name !!}</td>
                                    <td>{!! $product->productType->name !!}</td>
                                    <td>
                                    <a href="{{route('product.edit',$product->id)}}"><i class="fa fa-paper-plane"></i></a>
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