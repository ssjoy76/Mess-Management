@extends('layout.app')

@section('content')
<form action = "{{url('report/meal')}}" method ="get">
<input type="month" name="month" />
<button type="submit">find</button>
</form>
<br>
<br>
<br>
   
<table class="table table-dark table-bordered">
  <thead>
    <tr>
        <th>#</th>
        
        @foreach($dates as $date)
        <th>{{$date}}</th>
        @endforeach
        <th>Total</th>
    </tr>
  </thead>

  <tbody>
  @foreach($members as $member)
    <tr>
        <td>{{$member->name}}</td>

        @foreach($dates as $date)
        <td>
        @if(isset($reports[$date][$member->id]))
            @foreach($reports[$date][$member->id] as $v)
                <p>{{$v}}</p>
            @endforeach

        @endif
        </td>
        @endforeach

        <td>{{$reports['Total'][$member->id] or '0'}}</td>
    </tr>
  @endforeach
    <tr>
        <td>Total</td>
        @foreach($dates as $date)
        <td>{{$reports[$date]['Total'] or '0'}}</td>
        @endforeach
        <td>{{array_sum($reports['Total'])}}</td>
    </tr>
  </tbody>
</table>


@endsection