@extends('layout.template')

@section('content')
    <h1>Update MiscThing</h1>
    {!! Form::model($miscThing,['method' => 'PATCH','route'=>['miscThings.update',$miscThing->id]]) !!}
      <div class="form-group">
        {!! Form::label('record_type', 'record_type:') !!}
        {!! Form::text('record_type',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('report_name', 'report_name:') !!}
        {!! Form::text('report_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('report_query', 'report_query:') !!}
        {!! Form::text('report_query',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('bypassed_field_name', 'bypassed_field_name:') !!}
        {!! Form::text('bypassed_field_name',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('report_containing_menu', 'report_containing_menu:') !!}
        {!! Form::text('report_containing_menu',null,['class'=>'form-control']) !!}
    </div>    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop