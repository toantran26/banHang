<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> đăng nhập tài khoản admin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('theme/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ asset('theme/dist/css/skins/skin-blue.min.css')}}">
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>


</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a><b>Hệ thống </b>quản lý </a>
        @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">đăng nhập</p>

        <form action="{{route('loginPost')}}" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <div class="form-group has-feedback">
                <input type="text" name="username" id="name" class="form-control" placeholder="Tài khoản">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            @if ($errors->has('username') )
                <span style="color: red">{{$errors->first('username')}}</span>
            @endif
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" id="pass" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            @if ($errors->has('password') )
                <span style="color: red">{{$errors->first('password')}}</span>
            @endif
            <div class="row">
                <div class="col-xs-7">
                    <div class="checkbox icheck" style="padding-left: 20px" >
                        <label>
                            <input type="checkbox" name="txt_check"> nhớ mật khẩu
                        </label>
                    </div>
                </div>
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">đăng nhập</button>
                </div>
            </div>
        </form>
        <div style="align-content: center">
            <a href="#">quên mật khẩu</a><br>
        </div>

    </div>
</div>
<script src="{{asset('theme/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('theme/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('theme/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
