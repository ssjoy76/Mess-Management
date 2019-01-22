
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meal System</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<div class="container">
        <div class="row">
        <br>
        <br>    

        <center><h1>Welcome to meal accounts</h1></center>
        <br>
        <br>

          <table class="table">
            <thead class="thead-dark">
              <tr>
                <td> <a href ="{{url('member/form')}}" class="btn btn-info">Add Member</td>
                <td> <a href ="{{url('bazar/form')}}" class="btn btn-info">Add Bazar</td>
                <td> <a href ="{{url('deposit/form')}}" class="btn btn-info">Add deposit</td>
                <td> <a href ="{{url('mealcount/form')}}" class="btn btn-info">Add Meals</td>
              </tr>
            </tbody>
          </table>
        
    </div>
        <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        Generate report
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{url('report/bazar')}}">Bazar Report</a>
        <a class="dropdown-item" href="{{url('report/meal')}}">Meal Report</a>
        <a class="dropdown-item" href="{{url('report/summery')}}">Summery Report</a>
      </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>