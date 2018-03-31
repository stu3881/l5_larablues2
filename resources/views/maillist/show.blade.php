@extends('../layouts/template')
@section('content')
    <h1>MiscThing Show</h1>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Cover</label>
            <div class="col-sm-10">
                <img src="{{asset('img/'.$miscThing->image.'.jpg')}}" height="180" width="150" class="img-rounded">
            </div>
        </div>
        <div class="form-group">
            <label for="record_type" class="col-sm-2 control-label">record_type</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="record_type" placeholder={{$miscThing->record_type}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="report_name" class="col-sm-2 control-label">report_name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="report_name" placeholder={{$miscThing->report_name}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="report_query" class="col-sm-2 control-label">report_query</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="report_query" placeholder={{$miscThing->report_query}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="bypassed_field_name" class="col-sm-2 control-label">bypassed_field_name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="bypassed_field_name" placeholder={{$miscThing->bypassed_field_name}} readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="report_containing_menu" class="col-sm-2 control-label">report_containing_menu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="report_containing_menu" placeholder={{$miscThing->report_containing_menu}} readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('miscThings')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@stop