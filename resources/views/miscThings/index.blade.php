@extends('../layouts/template')

@section('content')
 <h1>l535 miscThings</h1>
 <a href="{{url('/miscThings/create')}}" class="btn btn-success">Create miscThing</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
        <th>Id</th>
         <th>record_type</th>
         <th>report_name</th>
         <th>report_query</th>
         <th>bypassed_field_name</th>
         <th>report_containing_menu</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($miscThings as $miscThing)
         <tr>]
             <td>{{ $miscThing->id }}</td>
             <td>{{ $miscThing->record_type }}</td>
             <td>{{ $miscThing->report_name }}</td>
             <td>{{ $miscThing->report_query }}</td>
             <td>{{ $miscThing->bypassed_field_name }}</td>
             <td>{{ $miscThing->report_containing_menu }}</td>
             <td><img src="{{asset('img/'.$miscThing->image.'.jpg')}}" height="35" width="30"></td>
             <td><a href="{{url('miscThings',$miscThing->id)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('miscThings.edit',$miscThing->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['miscThings.destroy', $miscThing->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection