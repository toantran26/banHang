@extends('backend.layout.app')

@section('title', 'Thêm  nhân viên')
@section('content')
    <h2><b>Thêm mới Nhân Viên</b></h2>
    @if (session('error'))
        <div class="alert alert-success" role="alert">
            <p style="color: red">{{ session('error') }}</p>
        </div>
    @endif
    <div class="form-row">
        <div class="col-sm-9" style="margin-left: 5%">
            <form action="{{route('nhanvien-addsave')}}" method="post" name="myForm">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="form-group">
                    <label for="inputAddress">Họ Và Tên </label>
                    <input type="text" class="form-control" name="fullname" id="inputAddress" aria-describedby="emailHelp" placeholder="Họ Tên" value="{{ old('fullname') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('fullname') )
                            <span style="color: red">{{$errors->first('fullname')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inlineRadio1"> Giới Tính </label><br>
                    <input style="margin-left: 10%" type="radio" name="sex" id="nam" value="nam" <?= (old('sex')=== 'nam') ? 'checked': ''?> >Nam
                    <input style="margin-left: 5%" type="radio" name="sex" id="nu" value="nu" <?= (old('sex') === 'nu') ? 'checked': ''?> >Nữ
                    <input style="margin-left: 5%" type="radio" name="sex" id="nu" value="gioitinhkhac" <?= (old('sex') === 'gioitinhkhac') ? 'checked': ''?> >Giới tính khác
                    <small class="form-text text-muted">
                        @if ($errors->has('sex') )
                            <span style="color: red">{{$errors->first('sex')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Ngày Tháng Năm Sinh </label>
                    <input type="date" class="form-control" name="birth" id="inputAddress"  value="{{ old('birth') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('birth') )
                            <span style="color: red">{{$errors->first('birth')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Số Chứng Minh Nhân Dân </label>
                    <input type="text" class="form-control" name="identity_card" id="inputAddress" aria-describedby="emailHelp" placeholder="Số chứng minh nhân dân" value="{{ old('identity_card') }}" required >
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('identity_card') )
                            <span style="color: red">{{$errors->first('identity_card')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group   mb-3 ">
                    <label for="inputAddress validationServer03">Số Điện Thoại  </label>
                    <input type="text" class="form-control is-invalid" name="phone" id="inputAddress" aria-describedby="emailHelp" placeholder="nhập số điện thoại"  value="{{ old('phone') }}" required>
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
                    <input type="text" class="form-control" name="username" id="inputAddress" aria-describedby="emailHelp" placeholder="Tên đăng nhập"  value="{{ old('username') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('username') )
                            <span style="color: red">{{$errors->first('username')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="password" value="{{old('password')}}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('password') )
                            <span style="color: red">{{$errors->first('password')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> Level </label>
                    <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="quyền nhân viên" name="access"  value="{{ old('access') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('access') )
                            <span style="color: red">{{$errors->first('access')}}</span>
                        @endif
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputAddress"> Địa Chỉ </label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="địa chỉ" name="address" value="{{ old('address') }}" required>
                    <small id="emailHelp" class="form-text text-muted">
                        @if ($errors->has('address') )
                            <span style="color: red">{{$errors->first('address')}}</span>
                        @endif
                    </small>
                </div>
                <button type="submit" class="btn btn-primary">Thêm nhân viên </button>
            </form>
        </div>
    </div>
@endsection
