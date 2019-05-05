<div class="box-body">

    <div class="col-md-6">

        <div class="form-group">
            {!! Form::label('shop_name','Name of the Office:') !!}
            {!! Form::text ('shop_name',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('br_number','Business Registration No:') !!}
            {!! Form::text ('br_number',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('address','Address:') !!}
            {!! Form::text ('address',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('contact_number','Contact Number:') !!}
            {!! Form::text ('contact_number',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('contact_number_alternative','Other Contact Number:') !!}
            {!! Form::text ('contact_number_alternative',null,['class'=>'form-control'])!!}
        </div>
    </div>




</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('submit',['class'=>'btn btn-primary col-sm-6']) !!}
</div>