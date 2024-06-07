<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/Xuong_oop/assets/admin/css/style1.css">
    <!-- <link rel="stylesheet" href="{{asset('assets/admin/css/style1.css') }}"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="d-flex justify-content-center align-center">
        <h1>Welcom {{$name}}</h1>
        @if (!isset($_SESSION['user']))
                    <a class="btn btn-primary" href="{{ url('login') }}">Login</a>
                @endif

                @if (isset($_SESSION['user']))
                    <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
                @endif
    </div>
    
</body>
</html>