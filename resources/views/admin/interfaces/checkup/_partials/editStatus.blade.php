<div class="box-body">

    <div class="col-md-6">

        {{--<div class="form-group">--}}
            {{--{!! Form::label('optician_id','Optician') !!}--}}
            {{--{!! Form::select ('optician_id',[''=>'Choose type']+ $optician ,null,['class'=>'form-control'])!!}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{!! Form::label('patient_id','patient') !!}--}}
            {{--{!! Form::select ('patient_id',[''=>'Choose type'] +$patient ,null,['class'=>'form-control'])!!}--}}
        {{--</div>--}}


        <div class="form-group">
            {!! Form::label('date','Date:') !!}
            {!! Form::Date ('date',null,['class'=>'form-control'])!!}
        </div>

        {{--<div class="form-group">--}}
            {{--{!! Form::label('type','Type') !!}--}}
            {{--{!! Form::select ('type',array('Generic'=>'Generic','Myopia'=>'Myopia','Hyperopia'=>'Hyperopia') ,null,['class'=>'form-control'])!!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--{!! Form::label('isMobile','Mobile or Other') !!}--}}
            {{--{!! Form::select ('isMobile',array(1=>'Mobile',0=>'Other'),null,['class'=>'form-control'])!!}--}}
        {{--</div>--}}

        <div class="form-group">
            {!! Form::label('status','Status') !!}
            {!! Form::select ('status',array('Pending'=>'Pending','Close'=>'Close','Appointment'=>'Appointment'),null,['class'=>'form-control'])!!}
        </div>

        {{--<div class="form-group">--}}
            {{--{!! Form::label('note','Note:') !!}--}}
            {{--{!! Form::textarea ('note',null,['class'=>'form-control'])!!}--}}
        {{--</div>--}}
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    {!! Form::submit('submit',['class'=>'btn btn-primary col-sm-6']) !!}
</div>
