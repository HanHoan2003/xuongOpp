@extends('layouts.master')
{{-- Tạo ra file master tổng để các trang con có thể kế thừa --}}
@section('title')
    Dashboard
@endsection

@section('content')
@if (!empty($_SESSION['errors']))
<div class="alert alert-warning">
    <ul>
        @foreach ($_SESSION['errors'] as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    @php
        unset($_SESSION['errors']);
    @endphp
</div>
@endif

    

<tbody>
  
    <form action="{{ url('admin/users/store') }}" enctype="multipart/form-data" method="POST">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="mb-3 mt-3">
            <label for="avatar" class="form-label">Avatar:</label>
            <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
        </div>
        <div class="mb-3 mt-3">
            <label for="password" class="form-label">Password:</label>
            <input type="text" class="form-control" id="password" placeholder="Enter password" name="password">
        </div>

        <div class="mb-3 mt-3">
            <label for="password" class="form-label">Confirm_password:</label>
            <input type="text" class="form-control" id="password" placeholder="Enter password" name="confirm_password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
<body>
    <h1>Thêm mới người dùng</h1> --}}
    {{-- !empty($_SESSION['errors']) kiem tra ton tai va k rong --}}
    {{-- @if (!empty($_SESSION['errors']))
    <div class="alert alert-warning">
        <ul>
            @foreach ($_SESSION['errors'] as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        @php
            unset($_SESSION['errors']);
        @endphp
    </div>
@endif
    
        
   
    <tbody>
      
        <form action="{{ url('admin/users/store') }}" enctype="multipart/form-data" method="POST">
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3 mt-3">
                <label for="avatar" class="form-label">Avatar:</label>
                <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
            </div>
            <div class="mb-3 mt-3">
                <label for="password" class="form-label">Password:</label>
                <input type="text" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>

            <div class="mb-3 mt-3">
                <label for="password" class="form-label">Confirm_password:</label>
                <input type="text" class="form-control" id="password" placeholder="Enter password" name="confirm_password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </tbody>
  </table> --}}
{{-- </body>
</html> --}}