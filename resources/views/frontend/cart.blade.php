@extends('frontend.app_frontend')

@section('title','shopping cart')

@section('content')
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h2 class="title"> danh sách giỏ hàng</h2>
            <div class="so-onepagecheckout row">

                <div class="col-left col-sm-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <td class="text-center">Image</td>
                                                <td class="text-left">tên sản phẩm</td>
                                                <td class="text-left">số lượng</td>
                                                <td class="text-right">Giá</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product['cart'] as $cart)
                                            <tr>
                                                <td class="text-center">
                                                    <a href="#">
                                                        <img width="60px" src="{{asset('img_product/'.$cart['img_link'])}}" alt="Xitefun Causal Wear Fancy Shoes" title="Xitefun Causal Wear Fancy Shoes" class="img-thumbnail">
                                                    </a>
                                                </td>
                                                <td class="text-left">
                                                    <a href="#">{{$cart['name']}}</a>
                                                </td>
                                                <td class="text-left">
                                                    {{$cart['count']}}
                                                </td>
                                                <td class="text-right">${{$cart['amount']}}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td class="text-right" colspan="3"><strong>Tổng tiền :</strong></td>
                                                <td class="text-right"> <?php
                                                    $sum=0;
                                                    foreach ($product['cart'] as $cart){ $sum =$cart['amount']+$sum;}
                                                    echo $sum;
                                                    ?>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-right col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="fa fa-user"></i> Thông tin người nhận</h4>
                        </div>
                        <div class="panel-body">
                            <form action="{{route('dat-hang')}}" method="post" name="myForm" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="hidden" name="customer_id" value="{{Auth::guard('customer')->user()->id}}"/>
                                <div class="form-group required">
                                    <label for="input-payment-firstname" class="control-label">Họ và Tên người nhận</label>
                                    <input type="text" class="form-control" id="input-payment-firstname" placeholder="full Name"  name="customer_fullname" value="{{old('customer_fullname')}}">
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-email" class="control-label">E-Mail người nhận</label>
                                    <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail" value="{{old('customer_email')}}" name="customer_email">
                                </div>
                                <div class="form-group required">
                                    <label for="input-payment-telephone" class="control-label">số điện thoại người nhận</label>
                                    <input type="text" class="form-control" id="input-payment-telephone" placeholder="Telephone" value="{{old('customer_phone')}}" name="customer_phone">
                                </div>
                                <div class="form-group">
                                    <label for="input-payment-fax" class="control-label">địa chỉ</label>
                                    <input type="text" class="form-control" id="input-payment-fax" placeholder="địa chỉ" value="{{old('address')}}" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="input-payment-fax" class="control-label">Ghi chú</label>
                                    <textarea type="text" class="form-control" id="input-payment-fax" placeholder="Ghi chú" value="{{old('message')}}" name="message">
                                    </textarea>
                                </div>
                                <div class="buttons">
                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-primary" id="button-confirm" value="Đặt Hàng">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
