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
                {!! Form::label('type','*User Type',['class' => 'control-label']) !!}
                {!! Form::select('type',array('optician'=>'Optician'),null,['class'=>'form-control','id'=>'role']) !!}
            </div>

            <div class="form-group">
                    {!! Form::label('is_active','Status:') !!}
                    {!! Form::select ('is_active',array(1 =>'Active', 0 =>'Not Active'),0 ,['class'=>'form-control'])!!}
            </div>

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