@extends ('layout.app')

@section('content') 

    <div class ="col-lg-offset-4 col-lg-4" type="button" class="list-group-item list-group-item-action" >
    <li class="list-group-item">
        <strong><h2>Name</h2></strong>
        <br>
        
        <h2>{{$members[$row->memberId]->name}}</h2>
        
    </li>   
    </div> 
    <div class ="col-lg-offset-4 col-lg-4" type="button" class="list-group-item list-group-item-action">
    <li class="list-group-item">
        <h2>Amounts</h2>
        <br>
        <h2>{{$row->amount}}</h2>
    </li>
    </div>
    <div class ="col-lg-offset-4 col-lg-4" type="button" class="list-group-item list-group-item-action">
    <li class="list-group-item">
        <h2>date</h2>
        <br>
        <h2>
        {{ $row->created_at->format('d/m/Y')}}
        </h2>
    </li>
    </div>
@endsection