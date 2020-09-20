
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description" content="eMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/emarket/ico/favicon-16x16.png')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/emarket/css/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('frontend/emarket/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/js/datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/css/themecss/lib.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/js/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/js/minicolors/miniColors.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/css/themecss/so_searchpro.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/css/themecss/so_megamenu.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/css/themecss/so-categories.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/css/themecss/so-listing-tabs.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/css/themecss/so-newletter-popup.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/css/footer/footer4.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/css/header/header4.css')}}" rel="stylesheet">
    <link id="color_scheme" href="{{ asset('frontend/emarket/css/home4.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/emarket/css/responsive.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style type="text/css">
        body{font-family:'Open Sans', sans-serif;}
    </style>

</head>

<body class="common-home res layout-4">

<div id="wrapper" class="wrapper-fluid banners-effect-10">
    <header id="header" class=" typeheader-4" style="background-color: #497bca;">
        <!-- Header Top -->
        <div class="header-top hidden-compact">
            <div class="container">
                <div class="row">
                    <div class="header-top-left col-lg-6 col-md-4 col-sm-6 col-xs-7">
                        @if (session('success'))
                            <div style="color: white ; text-align: center ; font-size: 15px" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="header-top-right collapsed-block col-lg-6 col-md-8 col-sm-6 col-xs-5">
                        <ul class="top-link list-inline">
                            @if(Auth::guard('customer')->check())
                                <input type="hidden" name="customer_id_cart" id="customer_id_cart" value="{{Auth::guard('customer')->user()->id}}" />
                                <li class="account" id="my_account">
                                    <a href="#" title="My Account " class="btn-xs dropdown-toggle" data-toggle="dropdown"> <span>{{Auth::guard('customer')->user()->username}} </span>  <span class="fa fa-caret-down"></span>
                                    </a>
                                    <ul class="dropdown-menu " style="display: none;">

                                        <li><a href="#">đổi mật khẩu</a>
                                        </li>
                                        <li><a href="{{route('logout')}}">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="checkout hidden-sm hidden-xs"><a href="{{route('register')}}" class="btn-link" title="dangky "><span ><i class="fa fa-check-square-o"></i>đăng ký </span></a>
                                </li>
                                <li class="hidden-xs"><a href="{{route('login')}}"><i class="fa fa-lock"></i>Login</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="navbar-logo col-lg-2 col-md-3 col-sm-12 col-xs-12">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <img src="{{ asset('frontend/emarket/image/catalog/logo4.png')}}" title="Your Store" alt="Your Store" />
                            </a>
                        </div>
                    </div>
                    <!-- //end Logo -->
                    <!-- Search -->
                    <div class="middle2 col-lg-7 col-md-6">
                        <div class="search-header-w">
                            <div class="icon-search hidden-lg hidden-md hidden-sm"><i class="fa fa-search"></i></div>
                            <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                                {{--                                from tìm kiếm--}}
                                <form method="GET" action="{{route('search')}}">
                                    <div id="search0" class="search input-group form-group">
                                        <input class="autosearch-input form-control" type="text" value="{{ @$_GET['search']}}" size="50" autocomplete="off" placeholder="tìm kiếm sản phẩm" name="search">
                                        <span class="input-group-btn">
                                    <button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
                                    </span>
                                    </div>
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- //end Search -->
                    @if(Auth::guard('customer')->check())
                    <div class="middle3 col-lg-3 col-md-3">
                        <div class="shopping_cart">
                            <div id="cart" class="btn-shopping-cart">
                                <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="shopcart">
                                    <span class="icon-c">
                                        <i class="fa fa-shopping-bag"></i>
                                    </span>
                                        <div class="shopcart-inner">
                                            <p class="text-shopping-cart">
                                                giỏ hàng
                                            </p>
                                            <span class="total-shopping-cart cart-total-full">
                                            <span class="items_cart"><?php
                                                if ($product['cart']){
                                                    echo "có sản phẩm";
                                                }else{
                                                    echo "chưa có sản phẩm";
                                                }
                                            ?>
                                            </span>
{{--                                            <span class="items_cart2"> item(s)</span>--}}
{{--                                            <span class="items_carts"> - $162.00 </span>--}}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                @if($product['cart'])
                                <ul class="dropdown-menu pull-right shoppingcart-box" role="menu">
                                        <li>
                                            <table class="table table-striped">
                                                <tbody>
                                                @foreach ($product['cart'] as $cart)
                                                <tr>
                                                    <td class="text-center" style="width:70px">
                                                        <a href="#">
                                                            <img src="{{ asset('img_product/'.$cart['img_link'])}}" style="width:70px" alt="Yutculpa ullamcon" title="Yutculpa ullamco" class="preview">
                                                        </a>
                                                    </td>
                                                    <td class="text-left"> <a class="cart_product_name" href="product.html">{{$cart['product_id']}}</a>
                                                    </td>
                                                    <td class="text-center">x{{$cart['count']}}</td>
                                                    <td class="text-center">${{$cart['amount']/1000000}}tr</td>
                                                    <td class="text-right">
                                                        <a href="product.html" class="fa fa-edit"></a>
                                                    </td>
                                                    <td class="text-right">
                                                        <a onclick="deletecart('{{$cart['id']}}');" class="fa fa-times fa-delete"></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </li>
                                        <li>
                                            <div>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-left"><strong>Tổng tiền thanh toán</strong>
                                                        </td>
                                                        <td class="text-right">
                                                           <?php
                                                            $sum=0;
                                                            foreach ($product['cart'] as $cart){ $sum =$cart['amount']+$sum;}
                                                            echo ($sum/1000000)."tr"."";
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <p class="text-right">
                                                    <a class="btn view-cart" href="{{route('cart',['customer_id'=>Auth::guard('customer')->user()->id])}}">
                                                        <i class="fa fa-shopping-cart"></i>đặt hàng
                                                    </a>
                                                </p>
                                            </div>
                                        </li>
                                </ul>
                                @endif
                            </div>

                        </div>
                        <!--//cart-->
                    </div>
                    @endif
                </div>

            </div>
        </div>
        <script>
            function deletecart(cart_id){
                var cart_id= cart_id;
                // var customer_id_cart =document.getElementById("customer_id_cart").value;
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{route('cart-delete')}}",
                    method: "POST",
                    data: {cart_id,_token: _token},
                    success: function (data) {
                        alert(data);
                        location.reload();

                    }
                });
            };
        </script>
        <!-- //Header center -->

        <!-- Header Bottom -->
        <div class="header-bottom hidden-compact">
            <div class="container">
                <div class="row">
                    <div class="bottom1 menu-vertical col-lg-2 col-md-3">
                        <!-- Secondary menu -->
                        <div class="responsive so-megamenu  megamenu-style-dev">
                            <div class="so-vertical-menu ">
                                <nav class="navbar-default">

                                    <div class="container-megamenu vertical">
                                        <div id="menuHeading">
                                            <div class="megamenuToogle-wrapper">
                                                <div class="megamenuToogle-pattern">
                                                    <div class="container">
                                                        Danh Mục
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="navbar-header">
                                            <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle">
                                                <i class="fa fa-bars"></i>
                                                <span>Danh Mục</span>
                                            </button>
                                        </div>
                                        <div class="vertical-wrapper" >
                                            <span id="remove-verticalmenu" class="fa fa-times"></span>
                                            <div class="megamenu-pattern">
                                                <div class="container-mega">
                                                    <ul class="megamenu">
                                                        <li class="item-vertical css-menu with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                <span>LapTop</span>
                                                                <b class="caret"></b>
                                                            </a>
                                                            <div class="sub-menu" data-subwidth="20">
                                                                <div class="content" >
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 hover-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">ASUS</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">DELL</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">HP</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">MacBock</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="item-vertical  style1 with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                <span class="label"></span>
                                                                <span>Máy ảnh</span>
                                                                <b class="caret"></b>
                                                            </a>
                                                            <div class="sub-menu" data-subwidth="40" >
                                                                <div class="content">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="row">
                                                                                <div class="col-md-12 static-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li><a href="#" class="main-menu">SONY</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="item-vertical css-menu with-sub-menu hover">
                                                            <p class="close-menu"></p>
                                                            <a href="#" class="clearfix">
                                                                <span>Điện Thoại</span>
                                                                <b class="caret"></b>
                                                            </a>
                                                            <div class="sub-menu" data-subwidth="20">
                                                                <div class="content" >
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="row">
                                                                                <div class="col-sm-12 hover-menu">
                                                                                    <div class="menu">
                                                                                        <ul>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">samsung</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">OPPO</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">XAOMI</a>
                                                                                            </li>
                                                                                            <li>
                                                                                                <a href="#" class="main-menu">Apple</a>
                                                                                            </li>

                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <!-- // end Secondary menu -->
                    </div>
                    <!-- Main menu -->
                    <div class="main-menu col-lg-10 col-md-9">
                        <div class="responsive so-megamenu megamenu-style-dev">
                            <nav class="navbar-default">
                                <div class=" container-megamenu  horizontal open ">
                                    <div class="navbar-header">
                                        <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <div class="megamenu-wrapper">
                                        <span id="remove-megamenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container-mega">
                                                <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                    <li>
                                                        <a href="{{route('home')}}">Home </a>
                                                    </li>
                                                    <li class="with-sub-menu hover">
                                                        <p class="close-menu"></p>
                                                        <a href="#" class="clearfix">
                                                            <strong>Sản phẩm mới</strong>
                                                            <img class="label-hot" src="{{ asset('frontend/emarket/image/catalog/menu/new-icon.png')}}" alt="icon items">
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!-- //end Main menu -->
                </div>
            </div>

        </div>

    </header>
    @yield('content')
    <footer class="footer-container typefooter-4">
        <section class="footer-middle ">
            <div class="container">
                <div class="row middle2 ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-style">
                        <div class="app-store module">
                            <h3 class="modtitle">Download APP:</h3>
                            <ul>
                                <li>
                                    <a title="App Store" href="#">
                                        <img src="{{ asset('frontend/emarket/image/catalog/demo/payment/app-1.png')}}" alt="App Store">
                                    </a>
                                </li>
                                <li>
                                    <a title="App Store" href="#">
                                        <img src="{{ asset('frontend/emarket/image/catalog/demo/payment/app-2.png')}}" alt="App Store">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="socials-w module">
                            <h3 class="modtitle">Follow Us:</h3>
                            <ul class="socials">
                                <li class="facebook"><a class="_blank" href="https://www.facebook.com/MagenTech" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="twitter"><a class="_blank" href="https://twitter.com/smartaddons" target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="google_plus"><a class="_blank" href="https://plus.google.com/u/0/+Smartaddons/posts" target="_blank"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li class="pinterest"><a class="_blank" href="https://www.pinterest.com/smartaddons/" target="_blank"><i class="fa fa-pinterest"></i></a>
                                </li>
                                <li class="youtube"><a class="_blank" href="#" target="_blank"><i class="fa fa-youtube-play"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer Bottom Container -->
        <section class="footer-bottom ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 copyright-w">
                        <div class="copyright">eMarket © 2018 Demo Store. All Rights Reserved. Designed by <a href="http://www.opencartworks.com/" target="_blank">OpenCartWorks.Com</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12 payment-w">
                        <img src="{{ asset('frontend/emarket/image/catalog/demo/payment/payment-4.png')}}" alt="imgpayment">
                    </div>
                </div>
            </div>
        </section>
        <div class="back-to-top"><i class="fa fa-angle-up"></i></div>
    </footer>

</div>

<script type="text/javascript" src="{{ asset('frontend/emarket/js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/owl-carousel/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/themejs/libs.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/unveil/jquery.unveil.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/countdown/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/datetimepicker/moment.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/modernizr/modernizr-2.6.2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/minicolors/jquery.miniColors.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/themejs/application.js')}}"></script>

<script type="text/javascript" src="{{ asset('frontend/emarket/js/themejs/homepage.js')}}"></script>

<script type="text/javascript" src="{{ asset('frontend/emarket/js/themejs/toppanel.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/themejs/so_megamenu.js')}}"></script>
<script type="text/javascript" src="{{ asset('frontend/emarket/js/themejs/addtocart.js')}}"></script>




</body>
</html>
