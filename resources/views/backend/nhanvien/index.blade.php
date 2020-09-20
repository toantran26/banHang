@extends('backend.layout.app')

@section('title', 'quản lý nhân viên')
@section('content')
    <section class="content-header ">
        <h2 class="giua mauchu">
            Quản lý nhân viên
        </h2>
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
    </section>
    <div>
        <a  class="btn btn-primary btn-sm" href="{{route('nhanvien-add')}}">Thêm mới</a>
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
            <th> số chứng minh </th>
            <th>Số ĐT</th>
            <th>Tên đăng nhập</th>
            <th>Địa chỉ</th>
            <th colspan="2" align="center">Thao tác</th>
        </tr>
        <?php foreach ($nhanvienList as $nhanvien): ?>
        <tr>
            <td>{{$nhanvien['fullname']}}</td>
            <td>
                {{$nhanvien['sex']}}
            </td>
            <td>{{$nhanvien['identity_card']}}</td>
            <td>{{$nhanvien['phone']}}</td>
            <td>{{$nhanvien['username']}}</td>
            <td>{{$nhanvien['address']}}</td>

            <td>
                <a class="btn" title="sửa nhân viên" href="nhanvien/edit/<?= $nhanvien['id']?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a class="btn" title="xóa nhân viên" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"
                   href="nhanvien/<?= $nhanvien['id']?>/delete" >
                    <span class="glyphicon glyphicon-trash text-danger"></span>
                </a>
                <a class="btn" title="xem chi tiết nhân viên" href="nhanvien/show/<?= $nhanvien['id']?>">
                    <span class=" glyphicon glyphicon-check"></span>
                </a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
@endsection
