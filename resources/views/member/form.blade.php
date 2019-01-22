@extends('layout.app')

@section('content')
<div class="container">
    <div class="col-lg-4 col-lg-offset-4">
        <center><h1>{{$crud_name}} {{$action_name}}</h1></center>
            <a href="{{url($crud_url.'/index')}}" class="btn btn-info" >Member list</a>
            <br>
            <br>

            
            <form class = "form-horizontal" action ="{{url($crud_url . '/save')}}" method ="POST">
                {{csrf_field()}}

                        <input type ="hidden" value="{{$row->id or ''}}" name ="id" />
                        

                        <div class="form-group">
                            <input class="form-control" name="name" placeholder ="Members name" value = "{{$row->name or ''}}">
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"></label>
                            <input class="form-control" name="description" placeholder ="description" value = "{{$row->description or ''}}">
                            
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"></label>
                            <input type="date" class="form-control" name="created_at" value ="@php echo (isset($row->created_at)) ? date('Y-m-d', strtotime($row->created_at)) : date('Y-m-d'); @endphp">
                       </div>

                         <div class="form-group">      
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
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