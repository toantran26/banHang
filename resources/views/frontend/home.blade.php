@extends('frontend.app_frontend')

@section('title','trang chủ')

@section('content')
<div class="main-container">
    <div id="content">
        <div class="container">
            <div class="box-content1" id="showsearch">
                <div class="module sohomepage-slider ">
                    <div class="yt-content-slider"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                        <div class="yt-content-slide">
                            <a href="#"><img src="{{ asset('frontend/laptop1.png')}}" alt="slider1" class="img-responsive"></a>
                        </div>
                        <div class="yt-content-slide">
                            <a href="#"><img src="{{ asset('frontend/laptop2.png')}}" alt="slider2" class="img-responsive"></a>
                        </div>
                        <div class="yt-content-slide">
                            <a href="#"><img src="{{ asset('frontend/laptop3.png')}}" alt="slider3" class="img-responsive"></a>
                        </div>
                        <div class="yt-content-slide">
                            <a href="#"><img src="{{ asset('frontend/laptop4.png')}}" alt="slider4" class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="loadeding"></div>
                </div>
            </div>

            <div class="row box-content2">
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 box-left">
                    <!-- Deals -->
                    <div class="module deals-layout4">
                        <h3 class="modtitle"><span> sản phẩm giảm giá </span></h3>
                        <div class="modcontent">
                            <div class="so-deal style2">
                                <div class="extraslider-inner products-list yt-content-slider"  data-rtl="yes" data-autoplay="no" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                                   <?php foreach($product['sale'] as $Sale) :?>
                                    <div class="item product-layout product-grid2">
                                        <div class="product-thumb transition product-item-container">
                                            <div class="left-block">
                                                <div class="product-image-container">
                                                    <div class="image">
                                                        <div class="box-label">
                                                            <span class="label label-sale">-<?php
                                                                $giam =$Sale['discount'];$goc=$Sale['price'];
                                                                $sale =($goc -$giam )/$goc*100;
                                                                echo floor($sale);
                                                                ?>%
                                                            </span>
                                                        </div>
                                                        <a href="#" target="_self" title="product">
                                                            <img src="{{ asset('img_product/'.$Sale['img_link'])}}" alt="Ground round enim" class="img-responsive">
                                                        </a>

                                                    </div>
                                                    <!--quickview-->
                                                    <div class="so-quickview">
                                                        <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                                    </div>
                                                    <!--end quickview-->
                                                </div>
                                            </div>
                                            <div class="right-block">
                                                <div class="caption">
                                                    <h4><a href="#" target="_self" title="Ground round enim">{{$Sale['name']}}</a></h4>
                                                    <div class="rating">
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    </div>

                                                    <p class="desc">{{$Sale['description']}}</p>
                                                    <p class="price">   <span class="price-new">${{$Sale['discount']/1000000}}tr</span>
                                                        <span class="price-old">${{$Sale['price']/1000000}}tr</span>
                                                    </p>
                                                    <div class="button-group">
                                                        <button class="addToCart" title="Add to Cart" type="button" onclick="add('{{$Sale['id']}}');">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <span>Add to Cart</span>
                                                        </button>
                                                        <button class="btn-button wishlist" type="button" title="Add to Wish List" onclick="wishlist.add('69');"><i class="fa fa-heart"></i><span>Add to Wish List</span>
                                                        </button>
                                                        <button class="btn-button compare" type="button" title="Compare this Product" onclick="compare.add('69');"><i class="fa fa-refresh"></i><span>Compare this Product</span>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 extra-right">
                    <div class="module so-extraslider-ltr ">
                        <h3 class="modtitle"><span>sản phẩm mới nổi bật</span></h3>
                        <div class="modcontent">
                            <div class="so-extraslider">
                                <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes" data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column0="4" data-items_column1="4" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                                    <?php foreach($product['new'] as $News) :?>
                                    <div class="item ">
                                        <div class="product-layout product-grid2 style1">
                                            <div class="product-thumb transition product-item-container">
                                                <div class="left-block">
                                                    <div class="product-image-container">
                                                        <div class="image">
                                                            @if($News['discount'] > 0)
                                                            <div class="box-label">
                                                                <span class="label label-sale">
                                                                  -<?php
                                                                    $giam =$News['discount'];$goc=$News['price'];
                                                                    $sale =($goc -$giam )/$goc*100;
                                                                    echo floor($sale);
                                                                    ?>%
                                                                </span>
                                                            </div>
                                                            @endif
                                                            <a href="#" target="_self" title="product">
                                                                <img src="{{ asset('img_product/'.$News['img_link'])}}" alt="Ground round enim" class="img-responsive">
                                                            </a>

                                                        </div>
                                                        <!--quickview-->
                                                        <div class="so-quickview">
                                                            <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <div class="caption">
                                                        <h4><a href="#" target="_self" title="Ground round enim">{{$News['name']}}</a></h4>
                                                        @if($News['discount'] > 0)
                                                            <p class="price">
                                                                <span class="price-new">${{$News['discount']/1000000}} tr</span>
                                                                <span class="price-old">${{$News['price']/1000000}}tr</span>
                                                            </p>
                                                         @else <p class="price"> ${{$News['price']/1000000}}tr</p>
                                                        @endif
                                                        <div class="button-group">
                                                            <button class="addToCart" title="Add to Cart" id="cart11"   onclick="add('{{$News['id']}}');" type="button">
                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                                    <i class="fa fa-shopping-cart">
                                                                    </i>  <span>Add to Cart</span>
                                                            </button>
                                                            <button class="btn-button wishlist" type="button" title="Add to Wish List" onclick="wishlist.add('69');"><i class="fa fa-heart"></i><span>Add to Wish List</span>
                                                            </button>
                                                            <button class="btn-button compare" type="button" title="Compare this Product" onclick="compare.add('69');"><i class="fa fa-refresh"></i><span>Compare this Product</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="module so-extraslider-ltr extra-layout4 cus1">
                <div class="form-group col-pre">
                    <div class="m-head">Điện Thoại<a href="#">View All</a></div>
                </div>
                <div class="modcontent">
                    <div class="so-extraslider">
                        <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes" data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column0="6" data-items_column1="3" data-items_column2="2" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                            <?php foreach($product['telephone'] as $telephone) :?>
                            <div class="item ">
                                <div class="product-layout product-grid2 style1">
                                    <div class="product-thumb transition product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container">
                                                <div class="image">
                                                    <div class="box-label">
                                                        @if($telephone['discount'] > 0)
                                                        <span class="label label-sale">--<?php
                                                            $giam =$telephone['discount'];$goc=$telephone['price'];
                                                            $sale =($goc -$giam )/$goc*100;
                                                            echo floor($sale);
                                                            ?>%</span>
                                                        @endif
                                                    </div>
                                                    <a href="#" target="_self" title="product">
                                                        <img src="{{ asset('img_product/'.$telephone['img_link'])}}" alt="Ground round enim" class="img-responsive">
                                                    </a>

                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                                </div>
                                                <!--end quickview-->
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <div class="caption">
                                                <h4><a href="#" target="_self" title="Ground round enim">{{$telephone['name']}}</a></h4>
                                                <div class="rating">
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                </div>
                                                @if($telephone['discount'] > 0)
                                                    <p class="price">
                                                        <span class="price-new">${{$telephone['discount']/1000000}} tr</span>
                                                        <span class="price-old">${{$telephone['price']/1000000}}tr</span>
                                                    </p>
                                                @else <p class="price"> ${{$telephone['price']/1000000}}tr</p>
                                                @endif
                                                <div class="button-group">
                                                    <button class="addToCart" title="Add to Cart" type="button" onclick="cart.add('69');"><i class="fa fa-shopping-cart"></i>  <span>Add to Cart</span>
                                                    </button>
                                                    <button class="btn-button wishlist" type="button" title="Add to Wish List" onclick="wishlist.add('69');"><i class="fa fa-heart"></i><span>Add to Wish List</span>
                                                    </button>
                                                    <button class="btn-button compare" type="button" title="Compare this Product" onclick="compare.add('69');"><i class="fa fa-refresh"></i><span>Compare this Product</span>
                                                    </button>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php endforeach ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="module so-extraslider-ltr extra-layout4 cus2">
                <div class="form-group col-pre">
                    <div class="m-head">Máy Tính<a href="#">View All</a></div>
                </div>
                <div class="modcontent">
                    <div class="so-extraslider">
                        <div class="yt-content-slider extraslider-inner products-list" data-rtl="yes" data-pagination="no" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column0="6" data-items_column1="3" data-items_column2="2" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-buttonpage="top">
                            <?php foreach($product['new'] as $News) :?>
                            <div class="item ">
                                <div class="product-layout product-grid2 style1">
                                    <div class="product-thumb transition product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container">
                                                <div class="image">
                                                    @if($News['discount'] > 0)
                                                        <div class="box-label">
                                                                <span class="label label-sale">
                                                                  -<?php
                                                                    $giam =$News['discount'];$goc=$News['price'];
                                                                    $sale =($goc -$giam )/$goc*100;
                                                                    echo floor($sale);
                                                                    ?>%
                                                                </span>
                                                        </div>
                                                    @endif
                                                    <a href="#" target="_self" title="product">
                                                        <img src="{{ asset('img_product/'.$News['img_link'])}}" alt="Ground round enim" class="img-responsive">
                                                    </a>

                                                </div>
                                                <!--quickview-->
                                                <div class="so-quickview">
                                                    <a class="iframe-link btn-button quickview quickview_handler visible-lg" href="quickview.html" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-eye"></i><span>Quick view</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <div class="caption">
                                                <h4><a href="#" target="_self" title="Ground round enim">{{$News['name']}}</a></h4>
                                                @if($News['discount'] > 0)
                                                    <p class="price">
                                                        <span class="price-new">${{$News['discount']/1000000}} tr</span>
                                                        <span class="price-old">${{$News['price']/1000000}}tr</span>
                                                    </p>
                                                @else <p class="price"> ${{$News['price']/1000000}}tr</p>
                                                @endif
                                                <div class="button-group">
                                                    <button class="addToCart" title="Add to Cart" id="cart11"   onclick="add('{{$News['id']}}');" type="button">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                                        <i class="fa fa-shopping-cart">
                                                        </i>  <span>Add to Cart</span>
                                                    </button>
                                                    <button class="btn-button wishlist" type="button" title="Add to Wish List" onclick="wishlist.add('69');"><i class="fa fa-heart"></i><span>Add to Wish List</span>
                                                    </button>
                                                    <button class="btn-button compare" type="button" title="Compare this Product" onclick="compare.add('69');"><i class="fa fa-refresh"></i><span>Compare this Product</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-brands clearfix">
                <div class="yt-content-slider contentslider" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column0="7" data-items_column1="6" data-items_column2="3" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
                    <div class="item">
                        <a href="#"><img src="{{ asset('frontend/emarket/image/catalog/brands/id4-brand1.jpg')}}" alt="brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('frontend/emarket/image/catalog/brands/id4-brand2.jpg')}}" alt="brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('frontend/emarket/image/catalog/brands/id4-brand3.jpg')}}" alt="brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('frontend/emarket/image/catalog/brands/id4-brand4.jpg')}}" alt="brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('frontend/emarket/image/catalog/brands/id4-brand5.jpg')}}" alt="brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('frontend/emarket/image/catalog/brands/id4-brand6.jpg')}}" alt="brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('frontend/emarket/image/catalog/brands/id4-brand7.jpg')}}" alt="brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('frontend/emarket/image/catalog/brands/id4-brand8.jpg')}}" alt="brand"></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ asset('frontend/emarket/image/catalog/brands/id4-brand5.jpg')}}" alt="brand"></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- //Main Container -->
<script>
    function add(id_product) {
            var product_id= id_product;
            var customer_id_cart =document.getElementById("customer_id_cart").value;
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{route('cart-add')}}",
                method: "POST",
                data: {customer_id_cart,product_id,_token: _token},
                success: function (data) {
                    alert(data);
                    location.reload();

                }
            });
        };

</script>
@endsection
