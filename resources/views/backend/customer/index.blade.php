@extends('backend.layout.app')

@section('title', 'Danh sách khách hàng')
@section('content')
    <section class="content-header ">
        <h2 class="giua mauchu">
            Quản lý Khách Hàng
        </h2>
    </section>
    <div>
        <a  class="btn btn-primary btn-sm" href="{{route('khachhang-add')}}">Thêm mới</a>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-success" role="alert">
                <p style="color: red">{{ session('error') }}</p>
            </div>
        @endif
        <form action="" method="get" class="sidebar-form " style=" width: 70%; float: right; margin-right: 10%;">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="tìm kiếm " style="background-color: #e3eaec;">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
    </div>
    <table class="table table-bordered ">
        <tr>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th> email </th>
            <th>Số ĐT</th>
            <th>Tên đăng nhập</th>
            <th>Địa chỉ</th>
            <th colspan="2" align="center">Thao tác</th>
        </tr>
        <?php foreach ($khachHangList as $khachHang): ?>
        <tr>
            <td>{{$khachHang['fullname']}}</td>
            <td>
                {{$khachHang['sex']}}
            </td>
            <td>{{$khachHang['email']}}</td>
            <td>{{$khachHang['phone']}}</td>
            <td>{{$khachHang['username']}}</td>
            <td>{{$khachHang['address']}}</td>

            <td>
                <a class="btn" href="customer/edit/<?= $khachHang['id']?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a class="btn" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"
                   href="nhanvien/<?= $khachHang['id']?>/delete" >
                    <span class="glyphicon glyphicon-trash text-danger"></span>
                </a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
@endsection
