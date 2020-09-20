@extends('backend.layout.app')

@section('title', 'Thêm đặt hàng')
@section('content')
    <h2><b> Đặt Hàng </b></h2>
    @if (session('error'))
        <div class="alert alert-success" role="alert">
            <p style="color: red">{{ session('error') }}</p>
        </div>
    @endif
    <div class="form-row">
        <div class="col-sm-9" style="margin-left: 3%">
            <form action="{{route('order-store')}}" method="post" name="myForm" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="form-group">
                    <label for="inputState">Mã sản phẩm </label>
                    <div id="userDropdown">
                        <select  name="product_id" id="product_id" data-live-search="true" class="selectpicker form-control" value="{{ old('product_id') }}" required>
                            <option selected>chọn mã sản phẩm ...</option>
                            <?php foreach ($products as $product): ?>
                            <option value="{{$product['id']}}">Mã : {{$product['id']}} &nbsp; &nbsp; Tên :  {{$product['name']}}</option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('product_id') )
                            <span style="color: red">{{$errors->first('product_id')}}</span>
                        @endif
                    </small>
                </div>

                <div class="form-group">
                    <label for="inputAddress"> Số lượng sản phẩm  </label>
                    <input type="number" class="form-control" min="0" name="count" id="count" placeholder=" số lượng sản phẩm"  value="{{ old('count') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('count') )
                            <span style="color: red">{{$errors->first('count')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputState">Mã sản phẩm </label>
                    <div id="userDropdown">
                        <select  name="customer_id"  data-live-search="true" class="selectpicker form-control" value="{{ old('customer_id') }}" required>
                            <option selected>chọn mã khách hàng ...</option>
                            <?php foreach ($customers as $customer): ?>
                            <option value="{{$customer['id']}}">Mã khách hàng : {{$customer['id']}}&nbsp; &nbsp; Tên khách hàng  {{$customer['fullname']}}</option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <small class="form-text text-muted">
                        @if ($errors->has('customer_id') )
                            <span style="color: red">{{$errors->first('customer_id')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Họ và tên  người nhận / Khách Hàng </label>
                    <input type="text" class="form-control" name="customer_fullname"  placeholder="tên đầy đủ người nhân /khách hàng " value="{{ old('customer_fullname') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('customer_fullname') )
                            <span style="color: red">{{$errors->first('customer_fullname')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email người nhận / khách hàng</label>
                    <input type="email" name="customer_email" class="form-control"  aria-describedby="emailHelp" placeholder=" email người nhận"  value="{{ old('customer_email') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('customer_email') )
                            <span style="color: red">{{$errors->first('customer_email')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group   mb-3 ">
                    <label for="inputAddress validationServer03">Số Điện Thoại người nhận </label>
                    <input type="text" class="form-control is-invalid" name="customer_phone" id="inputAddress" aria-describedby="emailHelp" placeholder="nhập số điện thoại"  value="{{ old('customer_phone') }}" required>
                    <div class="invalid-feedback">
                        @if ($errors->has('customer_phone') )
                            <span style="color: red">{{$errors->first('customer_phone')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> Địa Chỉ người nhận </label>
                    <input type="text" class="form-control"  placeholder="địa chỉ" name="address" value="{{ old('address') }}" required >
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('address') )
                            <span style="color: red">{{$errors->first('address')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> ghi chú nếu có </label>
                    <textarea type="text" class="form-control" name="message"  placeholder="ghi chú" value="{{ old('message') }}" required>
                    </textarea>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('message') )
                            <span style="color: red">{{$errors->first('message')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> tổng thanh toán  </label>
                    <input type="text" class="form-control" min="0" name="amount" id="amount" value="{{old('amount') }}" required readonly>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('amount') )
                            <span style="color: red">{{$errors->first('amount')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> trạng thái thanh toán  </label>
                    <select id="inputState" class="form-control" name="stastus" required>
                        <option selected> trạng thái</option>
                        <option value="0">chưa thanh toán</option>
                        <option value="1">Đã thanh toán</option>
                    </select>
                    <small class="form-text text-muted">
                        @if ($errors->has('stastus') )
                            <span style="color: red">{{$errors->first('stastus')}}</span>
                        @endif
                    </small>
                </div>
                <button type="submit" class="btn btn-primary"> đặt hàng </button>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(document).on('keyup', '#userDropdown .bs-searchbox input', function (e) {
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#count').keyup(function(){
                var count = $(this).val();
                var product_id=document.getElementById("product_id").value;
                if(count != '' && product_id !='') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
                {
                    var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                    $.ajax({
                        url:"{{ route('order-amount') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                        method:"POST", // phương thức gửi dữ liệu.
                        data:{product_id,count, _token:_token},
                        success:function(data){ //dữ liệu nhận về
                            $('#count').fadeIn();
                            $('input#amount').val(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                        }
                    });
                }
            });

            // $(document).on('click', 'li', function(){
            //     $('#country_name').val($(this).text());
            //     $('#countryList').fadeOut();
            // });

        });
    </script>


@endsection

