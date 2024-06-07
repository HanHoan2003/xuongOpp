
@extends('layouts.master')
{{-- Tạo ra file master tổng để các trang con có thể kế thừa --}}
@section('title')
    Dashboard
@endsection

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th>TRUONG</th>
      <th>GIA TRI</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach ($user as $field => $value)
    <tr>
      <td>{{$field}}</td>
      <td>{{$value}}</td>

      </tr>
    
    @endforeach
     
  </tbody>
</table>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body> --}}
    <h1>CHI TIET USER: {{$user['name']}}</h1>
    {{-- <table class="table table-striped">
    <thead>
      <tr>
        <th>TRUONG</th>
        <th>GIA TRI</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($user as $field => $value)
      <tr>
        <td>{{$field}}</td>
        <td>{{$value}}</td>

        </tr>
      
      @endforeach
       
    </tbody>
  </table> --}}
{{-- </body>
</html> --}}