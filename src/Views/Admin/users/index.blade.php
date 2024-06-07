@extends('layouts.master')
{{-- Tạo ra file master tổng để các trang con có thể kế thừa --}}
@section('title')
    DanhSachUrser
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sach User</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    
                    <div class="table-responsive">
                      <a href="{{ url('admin/users/create') }}" class="btn btn-primary">THEM MOI</a>

                      <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>IMAGE</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>CREATED AT</th>
                                <th>UPDATED AT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td><?= $user['id'] ?></td>
                                    <td>
                                        <img src="{{ asset($user['avatar']) }}" alt="" width="100px">
                                    </td>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['created_at'] ?></td>
                                    <td><?= $user['update_at'] ?></td>
                                    <td>

                                        <a class="btn btn-info"
                                            href="{{ url('admin/users/' . $user['id'] . '/show') }}">Xem</a>
                                        <a class="btn btn-warning"
                                            href="{{ url('admin/users/' . $user['id'] . '/edit') }}">Sửa</a>
                                        <a class="btn btn-danger"
                                            href="{{ url('admin/users/' . $user['id'] . '/delete') }}"
                                            onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

    </div>




  
    @if (isset($_SESSION['status']) && $_SESSION['status'])
        <div class="alert alert-warning">

            {{ $_SESSION['msg'] }}
        </div>
    @endif



    
         
        @endsection
