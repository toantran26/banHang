@extends('backend.layout.app')

@section('title', 'quản lý danh sách đặt hàng')
@section('content')
    <section class="content-header ">
        <h2 class="giua mauchu">
           quản lý danh sách đặt hàng
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
            <th>số lượng</th>
            <th> thành tiền </th>
            <th> trạng thái </th>
            <th> mã khách hàng</th>
            <th> số điện thoại nhận</th>
            <th>Địa chỉ nhận</th>
            <th colspan="2" align="center">Thao tác</th>
        </tr>
        <?php foreach ($orderLists as $orderList): ?>
        <tr>
            <td>{{$orderList['product_id']}}</td>
            <td>
                {{$orderList['count']}}
            </td>
            <td>{{$orderList['amount']}}</td>
            <td>
                <?php
                        if ($orderList['stastus'] ==='0'){
                            echo "chưa thanh toán";
                        }else{
                            echo "đã thanh toán";
                        }
                ?>
            </td>
            <td>{{$orderList['customer_id']}}</td>
            <td>{{$orderList['customer_phone']}}</td>
            <td>{{$orderList['address']}}</td>

            <td>
                <a class="btn"  href="order/edit/<?= $orderList['id']?>">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a class="btn" title="xóa nhân viên" onclick="return confirm('Bạn có chắc chắn muốn đơn hàng ?')"
                   href="order/<?= $orderList['id']?>/delete" >
                    <span class="glyphicon glyphicon-trash text-danger"></span>
                </a>
                <a class="btn"  href="order/show/<?= $orderList['id']?>">
                    <span class=" glyphicon glyphicon-check"></span>
                </a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
@endsection
