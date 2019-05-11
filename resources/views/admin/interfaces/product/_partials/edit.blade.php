<div class="box-body">

    <div class="col-md-6">

        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text ('name',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('product_type_id','Product Type') !!}
            {!! Form::select ('product_type_id',[''=>'Choose Type']+ $productType ,null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('vision_id','Vision :') !!}
            {!! Form::select ('vision_id',[1=>'Choose Type'] + $productVision,null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('patient_detail_id','Patient Name :') !!}
            {!! Form::select ('patient_detail_id',[''=>'Choose Type'] + $productPatient,null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::text ('description',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('product_image_id[]','Image:') !!}
            {!! Form::file ('product_image_id[]',array('multiple'=>true,'accept'=>'image/*'),['class'=>'form-control'])!!}
        </div>
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    {!! Form::submit('submit',['class'=>'btn btn-primary col-sm-6']) !!}
</div>
