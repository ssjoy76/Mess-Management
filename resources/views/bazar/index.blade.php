@extends('layout.app')

@section('content')
    <br>
    <div class="col-lg-8">
        <center><h1>{{$crud_name}} {{$action_name}}</h1></center>
        <table class="table table-dark">
  <thead>
    <tr>
      <th>Name</th>
      <th>date</th>
      <th>amount</th>
      <th>Action</th>
    </tr>
  </thead>
    
  @foreach($rows as $data)
    <tr>    
      <td>
      <a href="{{url('bazar/detail').'/'. $data->id}}"> {{ $members[$data->memberId]->name }}</a>
      
      </td>
     <td >
        {{$data->created_at}}    
     </td>
     <td >
        {{$data->amount}}    
     </td>
     <td >
        <a href="{{url('bazar/form').'/'. $data->id}}"> Edit </a>     
     </td>
     <td >
        <a href="{{url('bazar/delete').'/'. $data->id}}"> Delete </a>     
     </td>
    </tr>
    @endforeach
   </table>

    </div>
@endsection