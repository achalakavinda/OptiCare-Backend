<div class="box-body">

    <div class="col-md-6">

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text ('name',null,['class'=>'form-control'])!!}
            </div>
    </div>

</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
</div>