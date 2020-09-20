@extends('backend.layout.app')

@section('title', 'quản lý sản phẩm ')
@section('content')
    <section class="content-header ">
        <h2 class="giua mauchu">
            Quản lý sản phẩm
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
        <a  class="btn btn-primary btn-sm" href="{{route('sanpham-create')}}">Thêm mới</a>
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
            <th>Mã SP</th>
            <th> ảnh sản phẩm</th>
            <th>Tên SP</th>
            <th> Hãng </th>
            <th>Loại SP</th>
            <th>giá </th>
            <th> chiết khấu </th>
            <th> số lượng </th>
            <th colspan="2" align="center">Thao tác</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td>{{$product['id']}}</td>
            <td>
                <img src="{{asset('img_product/'.$product['img_link'])}}" class="img-responsive" alt="Chania" width="150" height="120">
            </td>
            <td>{{$product['name']}}</td>
            <td>
                {{$product['type_product_id']}}
            </td>
            <td>{{$product['category']}}</td>
            <td>{{$product['price']}}</td>
            <td>{{$product['discount']}}</td>
            <td>
                {{$product['quantity']}}
            </td>
            <td>
                <a class="btn"  href="product/edit/<?= $product['id']?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a class="btn"  onclick="return confirm('Bạn có chắc chắn muốn xóa ?')"
                   href="product/<?= $product['id']?>/delete" >
                    <span class="glyphicon glyphicon-trash text-danger"></span>
                </a>
                <a class="btn"  href="product/show/<?= $product['id']?>">
                    <span class=" glyphicon glyphicon-check"></span>
                </a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
@endsection
