




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>add data</h1>
    <a href="{{url('student')}}">black to </a>
    <form action="{{url('student')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name"> <br><br>
        <input type="text" name="cource" placeholder="cource"> <br><br>
        <input type="submit" name="submit">
    </form>
</body>

</html>