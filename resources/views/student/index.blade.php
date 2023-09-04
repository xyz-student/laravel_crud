<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>
 
 
<div class="modal fade" id="abc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{url('update-student')}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" id="stuid" name="stuid"  > <br><br>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name"> <br><br>
        <input type="text" name="cource" class="form-control" id="cource" placeholder="cource"> <br><br>
        <input type="submit" class="btn btn-outline-success" name="submit">
        </form>
      </div>
       
    </div>
  </div>
</div>



    <h1>add data</h1>
    <a href="{{url('student/create')}}">add class</a>
    <table class="table table-hover table-bordered  w-75 m-auto">
        <tr>
            <td>name</td>
            <td>cource</td>
            <td>edit</td>
            <td>delete</td>
        </tr>
        @foreach ($student as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->cource}}</td>
            <td><button class="editbtn btn btn-primary"   type ="button" value="{{$item->id}}">Edit</button> </td>
            <td> 
              <form action="{{url('student/'.$item->id)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit"  class="  btn btn-danger" >Delete</button>
              </form>
            </td>
        </tr>
        @endforeach
    </table>


    <script>
        $(document).ready(function(){
            $(document).on('click','.editbtn',function (){
                var stuid = $(this).val();
                // alert(stuid)
                $('#abc').modal('show')
                $.ajax({
                    type:"GET",
                    url:'./edit-student/'+ stuid,
                    success:function (response){
                      console.log(response)
                        $('#name').val(response.student.name);
                        $('#cource').val(response.student.cource);
                        $('#stuid').val(stuid);
                    }
                })
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>