<div class="box-body">

    <div class="col-md-6">

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text ('name',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                    {!! Form::label('email','Email:') !!}
                    {!! Form::email ('email',null,['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('usertype','*User Type',['class' => 'control-label']) !!}
                {!! Form::text('usertype',null,['class'=>'form-control','id'=>'UserType']) !!}
            </div>

            <div class="form-group">
                    {!! Form::label('is_active','Status:') !!}
                    {!! Form::text ('is_active',null,['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('password','Password:') !!}
                {!! Form::password ('password',['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                    {!! Form::label('avatar','Avatar:') !!}
                    {!! Form::file ('avatar',null,['class'=>'form-control'])!!}
            </div>
    </div>




</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
</div>