<div class="box-body">

    <div class="col-md-6">

        <div class="form-group">
            {!! Form::label('optician_id','Optician ID') !!}
            {!! Form::select ('optician_id',[''=>'Choose Type'] +$optician ,null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('patient_id','Patient ID') !!}
            {!! Form::select ('patient_id',[''=>'Choose Type']+ $patient ,null,['class'=>'form-control'])!!}
        </div>

        {{--<div class="form-group">--}}
        {{--{!! Form::label('patient_id','Patient ID') !!}--}}
        {{--{!! Form::select ('patient_id',[''=>'Choose Type']+ $productType ,null,['class'=>'form-control'])!!}--}}
        {{--</div>--}}

        <div class="form-group">
            {!! Form::label('check_up_id','Check up ID') !!}
            {!! Form::select ('check_up_id',[''=>'Choose Type']+ $checkup ,null,['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('l_sphere','Left | Sphere') !!}
            {!! Form::text ('l_sphere',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('l_cyl','Left | CYL') !!}
            {!! Form::text ('l_cyl',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('l_axis','Left | Axis') !!}
            {!! Form::text ('l_axis',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('l_add','Left | Add') !!}
            {!! Form::text ('l_add',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('l_p&b','Left | P&B') !!}
            {!! Form::text ('l_p&b',null,['class'=>'form-control'])!!}
        </div>



        <div class="form-group">
            {!! Form::label('r_sphere&b','Right | Sphere') !!}
            {!! Form::text ('r_sphere',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('r_cyl','Right | CYL') !!}
            {!! Form::text ('r_cyl',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('r_axis','Right | Axis') !!}
            {!! Form::text ('r_axis',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('r_add','Right | Add') !!}
            {!! Form::text ('r_add',null,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('r_p&b','Right | P&B') !!}
            {!! Form::text ('r_p&b',null,['class'=>'form-control'])!!}
        </div>




    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    {!! Form::submit('submit',['class'=>'btn btn-primary col-sm-6']) !!}
</div>
