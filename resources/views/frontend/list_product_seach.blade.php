@extends('frontend.app_frontend')

@section('title','sản phẩm tìm kiếm')

@section('content')
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Tìm Kiếm </a></li>
    </ul>

    <div class="row">
        <!--Left Part Start -->
        <aside class="col-sm-4 col-md-3 content-aside" id="column-left">
            <div class="module category-style">
                <h3 class="modtitle">Categories</h3>
                <div class="modcontent">
                    <div class="box-category">
                        <ul id="cat_accordion" class="list-group">
                            <li class="hadchild"><a href="category.html" class="cutom-parent">Máy Tính</a>   <span class="button-view  fa fa-plus-square-o"></span>
                                <ul style="display: none;">
                                    <li><a href="category.html">Men's Watches</a></li>
                                    <li><a href="category.html">Women's Watches</a></li>
                                    <li><a href="category.html">Kids' Watches</a></li>
                                    <li><a href="category.html">Accessories</a></li>
                                </ul>
                            </li>
                            <li class="hadchild"><a class="cutom-parent" href="category.html">Điện Thoại</a>   <span class="button-view  fa fa-plus-square-o"></span>
                                <ul style="display: none;">
                                    <li><a href="category.html">Cycling</a></li>
                                    <li><a href="category.html">Running</a></li>
                                    <li><a href="category.html">Swimming</a></li>
                                    <li><a href="category.html">Football</a></li>
                                    <li><a href="category.html">Golf</a></li>
                                    <li><a href="category.html">Windsurfing</a></li>
                                </ul>
                            </li>
                            <li class="hadchild"><a href="category.html" class="cutom-parent">Máy Ảnh</a>   <span class="button-view  fa fa-plus-square-o"></span>
                                <ul style="display: none;">
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                    <li><a href="category.html">Sub Categories</a></li>
                                </ul>
                            </li>
                            <li class="hadchild"><a href="category.html" class="cutom-parent">Thiết Bị & Phụ Kiện</a>  <span class="button-view  fa fa-plus-square-o"></span>
                                <ul style="display: none;">
                                    <li><a href="category.html">Men's Watches</a></li>
                                    <li><a href="category.html">Women's Watches</a></li>
                                    <li><a href="category.html">Kids' Watches</a></li>
                                    <li><a href="category.html">Accessories</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>


                </div>
            </div>
        </aside>
        <!--Left Part End -->

        <!--Middle Part Start-->
        <div id="content" class="col-md-9 col-sm-8">
            <div class="products-category">
                <div style="margin-bottom: 30px ; font-size: 24px">
                <span class=" "> Shop liên quan đến : </span>&nbsp;&nbsp;<span style="color: #ee4d2d;">{{ $_GET['search']}}</span>
                </div>
                <div class="products-list row nopadding-xs so-filter-gird list">
                    <?php foreach($product['search'] as $search) :?>
                    <div class="product-layout col-lg-15 col-md-4 col-sm-6 col-xs-12">
                        <div class="product-item-container">
                            <div class="left-block">
                                <div class="product-image-container second_img">
                                    <a href="#" target="_self" title="Chicken swinesha">
                                        <img src="{{ asset('img_product/'.$search['img_link'])}}" class="img-1 img-responsive" alt="image">
                                        <img src="{{ asset('img_product/'.$search['img_link'])}}" class="img-2 img-responsive" alt="image">
                                    </a>
                                </div>
                                <div class="box-label"> <span class="label-product label-sale">
                                        @if($search['discount'] > 0)
                                                                  -<?php
                                                                    $giam =$search['discount'];$goc=$search['price'];
                                                                    $sale =($goc -$giam )/$goc*100;
                                                                    echo floor($sale);
                                                                    ?>%
                                        @endif </span>
                                    <span class="label-product label-new"> New </span>
                                </div>

                            </div>
                            <div class="right-block">
                                <div class="caption">
                                    <h4><a href="product.html" title="Chicken swinesha" target="_self">{{$search['name']}}</a></h4>
                                    @if($search['discount'] > 0)
                                        <p class="price">
                                            <span class="price-new">${{$search['discount']/1000000}} tr</span>
                                            <span class="price-old">${{$search['price']/1000000}}tr</span>
                                        </p>
                                    @else <p class="price"> ${{$search['price']/1000000}}tr</p>
                                    @endif
                                    <div class="description item-desc">
                                        <p>
                                            {{$search['description']}}

                                        </p>
                                    </div>
                                    <div class="list-block">
                                        <button class="addToCart btn-button" type="button" title="Add to Cart" onclick="cart.add('101', '1');"><i class="fa fa-shopping-basket"></i>
                                        </button>
                                        <button class="wishlist btn-button" type="button" title="Add to Wish List" onclick="wishlist.add('101');"><i class="fa fa-heart"></i>
                                        </button>
                                        <button class="compare btn-button" type="button" title="Compare this Product" onclick="compare.add('101');"><i class="fa fa-refresh"></i>
                                        </button>
                                        <!--quickview-->
                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i></a>
                                        <!--end quickview-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php endforeach;?>
                </div>
                <!--// End Changed listings-->
                <!-- Filters -->
                <div class="product-filter product-filter-bottom filters-panel">
                    <div class="row">
                        <div class="col-sm-6 text-left"></div>
                        <div class="col-sm-6 text-right">Showing 1 to 15 of 15 (1 Pages)</div>
                    </div>
                </div>
                <!-- //end Filters -->

            </div>

        </div>


        <!--Middle Part End-->
    </div>
</div>
@endsection
