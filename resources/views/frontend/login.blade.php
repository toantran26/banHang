
@extends('frontend.app_frontend')

@section('title','trang chủ')
@section('content')
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Login</a></li>
        </ul>

        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="page-login">
                    <div class="account-border">
                        <div class="row">
                                <form action="{{route('login_save')}}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="col-sm-6 customer-login" style="margin-left: 25%">
                                        <div class="well">
                                            <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> đăng nhập tài khoản</h2>
                                             @if (session('error'))
                                                <div class="alert alert-success" role="alert">
                                                    <p><strong style="color: red">{{ session('error') }}</strong></p>
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <label class="control-label " for="input-email">Tên tài khoản</label>
                                                <input type="text" name="username" value="{{old('username')}}" id="input-email" class="form-control" />
                                                @if ($errors->has('username') )
                                                    <span style="color: red">{{$errors->first('username')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label " for="input-password">Password</label>
                                                <input type="password" name="password" value="" id="input-password" class="form-control" />
                                                @if ($errors->has('password') )
                                                    <span style="color: red">{{$errors->first('password')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="bottom-form">
                                            <a href="#" class="forgot">quên mật khẩu</a>
                                            <input type="submit" value="Login" class="btn btn-default pull-right" />
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
