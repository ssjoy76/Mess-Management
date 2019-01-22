@extends('layout.app')

@section('content')
    <br>
    <div class="col-lg-6 col-lg-offset-3">
        <center><h1>{{$crud_name}} {{$action_name}}</h1></center>
        <table class="table table-dark">
  <thead>
    <tr>
      <th>Name</th>
      <th>Action</th>
      
    </tr>
  </thead>
    
  @foreach($rows as $data)
    <tr>    
      <td>
      <a href="{{url('member/detail').'/'. $data->id}}"> {{$data->name}}</a>
      <span class="float-right">{{$data->created_at->diffForHumans()}}</span>
      </td>
     <td >
     <a href="{{url('member/form').'/'. $data->id}}"> Edit </a>     
     </td>
     <td >
     <a href="{{url('member/delete').'/'. $data->id}}"> Delete </a>     
     </td>
    </tr>
    @endforeach
   </table>

    </div>

 


@endsection