<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
<h3># Arisha Service Confirm Your Partner Request.</h3>

<h4>Dear {{$Emp->name?? " "}}
</h4><br>
<p>Congrats, now you are a partner of Arisha Service .
</p><br>
<p>Your Login credentials</p> <br>
<p>Phone : {{$Emp->phone}}</p><br>
<p>Password : {{$password}}</p><br>
<a href="http://arisha-service.de/">LOGIN Arisha Service</a>





Thanks,<br>
Arisha Service


</body>
</html>
