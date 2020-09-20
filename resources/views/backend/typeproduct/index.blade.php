@extends('backend.layout.app')

@section('title', 'quản lý loại sản phẩm ')
@section('content')
    <section class="content-header ">
        <h2 class="giua mauchu">
            Quản lý Loại sản phẩm
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
        <a  class="btn btn-primary btn-sm" href="{{route('loai-sanpham-create')}}">Thêm mới</a>
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
            <th>Mã Loại sản phẩm</th>
            <th>Tên lọai sản phẩm</th>
            <th colspan="2" align="center">Thao tác</th>
        </tr>
        <?php foreach ($typeProducts as $typeProduct): ?>
        <tr>
            <td>{{$typeProduct['id']}}</td>
            <td>
                {{$typeProduct['name_type_product']}}
            </td>


            <td>
                <a class="btn" href="typeproduct/edit/<?= $typeProduct['id']?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a class="btn"  onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"
                   href="typeproduct/<?= $typeProduct['id']?>/delete" >
                    <span class="glyphicon glyphicon-trash text-danger"></span>
                </a>
                <a class="btn"  href="typeproduct/show/<?= $typeProduct['id']?>">
                    <span class=" glyphicon glyphicon-check"></span>
                </a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
@endsection
