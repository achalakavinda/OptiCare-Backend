<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('UserType','*User Type',['class' => 'control-label']) !!}
            {!! Form::text('usertype',null,['class'=>'form-control','id'=>'UserType']) !!}
        </div>
    </div>




</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
</div>