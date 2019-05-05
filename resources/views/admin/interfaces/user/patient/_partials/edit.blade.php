<div class="box-body">

    <div class="col-md-6">


        <div class="form-group">
            {!! Form::label('address','Address:') !!}
            {!! Form::text ('address',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('contact_number','Contact Number:') !!}
            {!! Form::text ('contact_number',null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('birthday','Date of Birth:') !!}
            {!! Form::date ('birthday',null,['class'=>'form-control'])!!}
        </div>


        <div class="form-group">
            {!! Form::label('password','Password:') !!}
            {!! Form::password ('password',['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('avatar_id','Avatar:') !!}
            {!! Form::file ('avatar_id',null,['class'=>'form-control'])!!}
        </div>
    </div>




</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
</div>