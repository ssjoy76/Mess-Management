@extends('layout.app')

@section('content')
    <form action = "{{url('report/summery')}}" method ="get">
    <input type="month" name="month" />
    <button type="submit">find</button>
    </form>
    <br>
    <br>
    <br>
    <strong>Total Bazar</strong>  :   {{$total_bazars->total_amount}}
     <br>
     <strong>Total meal</strong> :   {{$total_meals->total_meal}}
     <br>
     <strong> Meal Rate </strong>:   {{$meal_rate}}
    <br>
    <br>



    <table class="table table-light table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Total meal</th>
            <th>Total cost</th>
            <th>Deposit</th>
            <th>Balance</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach($members as $member)
        <tr>
            <td>{{$member->name}}</td>
           
            <td>{{$meals[$member->id]->total_meal or '0'}}</td>
            <td>{{$costs[$member->id]}}</td>
            <td>{{$deposits[$member->id]->total_deposit or 0 }} </td>
            <td>{{$balance[$member->id]}} </td>
            
        </tr> 
    @endforeach
    
    </tbody>
    </table>


@endsection

