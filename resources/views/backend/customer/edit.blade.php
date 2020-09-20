@extends('backend.layout.app')

@section('title', 'quản lý Khách Hàng')
@section('content')
    <h2><b>Sửa thông Khách Hàng</b></h2>
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
    <div class="form-row">

        <div class="col-sm-9" style="margin-left: 5%">
            <form action="{{route('khachhang-updatesave' , ['id'=>$getCustomerId['id']])}}" method="post" name="myForm">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <input type="hidden" name="id" value="{{ old('id', $getCustomerId['id']) }}">
                <div class="form-group">
                    <label for="inputAddress">Họ Và Tên </label>
                    <input type="text" class="form-control" name="fullname" id="inputAddress" aria-describedby="emailHelp" placeholder="Họ Tên" value="{{ old('fullname', $getCustomerId['fullname']) }}" >
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('fullname') )
                            <span style="color: red">{{$errors->first('fullname')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inlineRadio1"> Giới Tính </label><br>
                    <input style="margin-left: 10%" type="radio" name="sex" id="nam" value="nam" <?= (old('sex', $getCustomerId['sex']) === 'nam') ? 'checked': ''?> >Nam
                    <input style="margin-left: 5%" type="radio" name="sex" id="nu" value="nu" <?= (old('sex', $getCustomerId['sex']) === 'nu') ? 'checked': ''?> >Nữ
                    <input style="margin-left: 5%" type="radio" name="sex" id="nu" value="gioitinhkhac" <?= (old('sex', $getCustomerId['sex']) === 'gioitinhkhac') ? 'checked': ''?> >Giới tính khác
                    <small class="form-text text-muted">
                        @if ($errors->has('sex') )
                            <span style="color: red">{{$errors->first('sex')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Ngày Tháng Năm Sinh </label>
                    <input type="date" class="form-control" name="birth" id="inputAddress"  value="{{ old('birth', $getCustomerId['birth']) }}" >
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('birth') )
                            <span style="color: red">{{$errors->first('birth')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email', $getCustomerId['email']) }}" >
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('email') )
                            <span style="color: red">{{$errors->first('email')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group   mb-3 ">
                    <label for="inputAddress validationServer03">Số Điện Thoại  </label>
                    <input type="text" class="form-control is-invalid" name="phone" id="inputAddress" aria-describedby="emailHelp" placeholder="nhập số điện thoại"  value="{{ old('phone', $getCustomerId['phone']) }}" required>
                    {{--            <small id="emailHelp" class="form-text text-muted">@if ($errors->has('phone') )--}}
                    {{--                    <span style="color: red">{{$errors->first('phone')}}</span>--}}
                    {{--                @endif--}}
                    {{--            </small>--}}
                    <div class="invalid-feedback">
                        @if ($errors->has('phone') )
                            <span style="color: red">{{$errors->first('phone')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Tên Đăng Nhập  </label>
                    <input type="text" class="form-control" name="username" id="inputAddress" aria-describedby="emailHelp" placeholder="Tên đăng nhập"  value="{{ old('username', $getCustomerId['username']) }}" >
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('username') )
                            <span style="color: red">{{$errors->first('username')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('Password') )
                            <span style="color: red">{{$errors->first('Password')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> Địa Chỉ </label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="địa chỉ" name="address" value="{{ old('address', $getCustomerId['address']) }}" >
                    @if ($errors->has('address') )
                        <span style="color: red">{{$errors->first('address')}}</span>
                        @endif
                        </small>
                </div>
                <button type="submit" class="btn btn-primary">sửa Khách Hàng </button>
            </form>
        </div>
    </div>

@endsection
