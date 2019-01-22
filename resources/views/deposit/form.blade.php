@extends('layout.app')

@section('content')
<div class="container">
    <div class="col-lg-4 col-lg-offset-4">
        <center><h1>{{$crud_name}} {{$action_name}}</h1></center>
            <a href="{{$crud_url}}/index" class="btn btn-info" >Deposit</a>

            <br>
            <br>

            
            <form class = "form-horizontal" action ="{{url($crud_url . '/save')}}" method ="POST">
                {{csrf_field()}}

                        <input type ="hidden" value="{{$row->id or ''}}" name ="id" />
                        

                         <div class="form-group">
                         
                            <input type ="date" class="form-control" name ="created_at"  value="@php echo (isset($row->created_at)) ? date('Y-m-d', strtotime($row->created_at)) : date('Y-m-d'); @endphp" >
                            
                       </div>

                        <div class="form-group">
                           <select name="memberId" class="form-control" >
                                @foreach($members as $data)
                                
                                        <option  
                                        @if(isset($row->memberId) && $data->id == $row->memberId)
                                             selected
                                        @endif
                                                                               
                                        value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach    
                            </select>
                        

                        </div>
                        <div class="form-group">      

                            <input type="text" class="form-control" name="amount"  placeholder="Amounts" value="{{$row->amount or ''}}" >
                        </div>
                       
                        <div class="form-group">      
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                       


            </form>
            @if(count($errors)>0)
            <div class="alert alert-danger ">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
                </div>
            @endif
   
</div>
</div>
@endsection