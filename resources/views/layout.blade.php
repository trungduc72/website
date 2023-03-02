<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}">
    <link rel="cononical" content="{{$url_canonical}}"> --}}

    <title> @yield('title') | Trà Thái Nguyên</title>

    {{-- <meta property="og:site_name" content="http://127.0.0.1:8000/home">
    <meta property="og:description" content="{{$meta_desc}}">
    <meta property="og:title" content= @yield('title')>
    <meta property="og:url" content="{{$url_canonical}}">
    <meta property="og:type" content="website"> --}}

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/sweetalert.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/5bf87cd97a.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> 0396232685</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> duczunnn@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href={{ route('home') }}
                                style="font-size: 38px; font-family: 'Passions Conflict', cursive; color: black;">
                                <img src="{{ asset('frontend/images/logo-removebg.png') }}" alt=""
                                    style="width: 250px" />
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                                <?php 
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                    if($customer_id != null && $shipping_id == null){
                                ?>
                                <li><a href={{ route('checkout') }}> Thanh toán</a>
                                </li>
                                <?php
                                    }
                                    elseif($customer_id != null && $shipping_id != null){
                                ?>
                                <li><a href={{ route('payment') }}> Thanh toán</a>
                                </li>
                                <?php
                                    }
                                ?>

                                <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id != null){
                                ?>
                                <li><a href={{ route('logout-checkout') }}> Đăng xuất</a>
                                </li>
                                <?php    
                                }
                                else{
                                ?>
                                <li><a href={{ route('login-checkout') }}> Đăng nhập</a></li>
                                <li><a href={{ route('signup') }}>Đăng kí</a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="pull-right-bot">
                            <div class="form-search">
                                <form action={{ route('search') }} method="POST">
                                    @csrf
                                    <input type="text" name="keyword" placeholder="Tìm kiếm" />
                                    <button type="submit" class="icon-search"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </div>

                            <span><a href={{ route('show-cart-ajax') }}><i class="fa fa-shopping-cart"></i> Giỏ
                                    hàng</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href={{ route('home') }}>Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Cửa hàng<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Sản phẩm</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-sm-3">
                        <form action={{ route('search') }} method="POST">
                            @csrf
                            <input class="form-control" type="text" name="keyword" placeholder="Tìm kiếm" />
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators" style="bottom: -65px">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>TRÀ</span>-THÁI NGUYÊN</h1>
                                    <h2>Tinh Hoa Trà Việt</h2>
                                    <p>Là đơn vị chuyên cung cấp sỉ lẻ các loại trà khô Thái Nguyên chất
                                        lượng cao:
                                        Trà Đinh, Tôm Nõn, Trà Móc Câu, Trà Búp, Trà Tân Cương. </p>
                                    {{-- <button type="button" class="btn btn-default get">Get it now</button> --}}
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('frontend/images/che.jpg') }}" class="girl img-responsive"
                                        alt="" style="max-width: 450px;" />
                                    {{-- <img src="{{asset('frontend/images/che.jpg')}}" class="pricing" alt="" /> --}}
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>TRÀ</span>-THÁI NGUYÊN</h1>
                                    <h2>Tầm Nhìn Vươn Xa</h2>
                                    <p>Hợp tác & Kết nối thương hiệu Việt. </p>
                                    {{-- <button type="button" class="btn btn-default get">Get it now</button> --}}
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('frontend/images/che.jpg') }}" class="girl img-responsive"
                                        alt="" style="max-width: 450px;" />
                                    {{-- <img src="{{asset('frontend/images/che.jpg')}}" class="pricing" alt="" /> --}}
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>TRÀ</span>-THÁI NGUYÊN</h1>
                                    <h2>Đỉnh Cao - Thượng Hạng</h2>
                                    <p>Đưa thương hiệu vươn tầm quốc tế. </p>
                                    {{-- <button type="button" class="btn btn-default get">Get it now</button> --}}
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{ asset('frontend/images/che.jpg') }}" class="girl img-responsive"
                                        alt="" style="max-width: 450px;" />
                                    {{-- <img src="{{asset('frontend/images/che.jpg')}}" class="pricing" alt="" /> --}}
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row" style="margin-top: 40px">
                <div class="col-sm-3">
                    <div class="left-sidebar" style="margin-top: 10px">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <div id="filters" class="button-group">
                                {{-- <button class="button is-checked" data-filter="*">show all</button> --}}
                                @foreach ($category as $item)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a href="/category/{{ $item->category_id }}"> {{ $item->category_name }} </a>
                                                {{-- <button class="button" data-filter="{{ $item->category_id }}">{{ $item->category_name }}</button> --}}
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach                                
                            </div>
                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Thương hiệu</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <div id="filter" class="button-group">
                                        @foreach ($brand as $item)
                                            <li>
                                                <a href="/brand/{{ $item->brand_id }}"> {{ $item->brand_name }}</a>
                                                {{-- <button class="button" data-filter="{{ $item->brand_id }}">{{ $item->brand_name }}</button> --}}
                                            </li>
                                        @endforeach
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <!--/brands_products-->
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    @yield('content')
                    
                </div>
            </div>
        </div>
    </section>

    <section style="margin-top: 50px">
        <div class="container">
            <div class="row">
                <div class="element">
                    <h2 class="title text-center">Cam kết của chúng tôi</h2>
                    <ul style="display: flex">
                        <li>
                            <div class="element-icon">
                                <span>
                                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                    <lord-icon src="https://cdn.lordicon.com/iejknaed.json" trigger="hover"
                                        colors="outline:#000000,primary:#848484,secondary:#a5e830,tertiary:#ebe6ef,quaternary:#a5e830"
                                        style="width:110px;height:110px">
                                    </lord-icon>
                                </span>
                            </div>
                            <div class="element-content">
                                <h4>Bảo vệ người mua</h4>
                                <span>
                                    Consectetur adipiscing elit, sed do eiusmod tempo.
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="element-icon">
                                <span>
                                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                    <lord-icon src="https://cdn.lordicon.com/ptzvfshs.json" trigger="hover"
                                        colors="outline:#121331,primary:#a5e830,secondary:#eee966"
                                        style="width:110px;height:110px">
                                    </lord-icon>
                                </span>
                            </div>
                            <div class="element-content">
                                <h4>Giá tốt nhất</h4>
                                <span>
                                    Consectetur adipiscing elit, sed do eiusmod tempo.
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="element-icon">
                                <span>
                                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                    <lord-icon src="https://cdn.lordicon.com/osvvqecf.json" trigger="hover"
                                        colors="outline:#000000,primary:#000000,secondary:#ffffff,tertiary:#a5e830"
                                        style="width:110px;height:110px">
                                    </lord-icon>
                                </span>
                            </div>
                            <div class="element-content">
                                <h4>Hỗ trợ 24/7</h4>
                                <span>
                                    Consectetur adipiscing elit, sed do eiusmod tempo.
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="element-icon">
                                <span>
                                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                    <lord-icon src="https://cdn.lordicon.com/qwzdhaoa.json" trigger="hover"
                                        colors="outline:#000000,primary:#f24c00,secondary:#a66037,tertiary:#a5e830"
                                        style="width:110px;height:110px">
                                    </lord-icon>
                                </span>
                            </div>
                            <div class="element-content">
                                <h4>Chất lượng tốt</h4>
                                <span>
                                    Consectetur adipiscing elit, sed do eiusmod tempo.
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </section>

    <footer id="footer">
        <!--Footer-->

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Gian hàng chúng tôi</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <ul class="footer-visit" style="display: flex">
                                        <li>
                                            <i style="font-size: 23px; color: #ffffff; padding-right: 15px; position: relative; top: 25%"
                                                class="fa-solid fa-location-dot"></i>
                                        </li>
                                        <li>
                                            <a href="#" style="line-height: 30px">
                                                Cao Phong, Hợp Tiến, Đồng Hỷ, Thái Nguyên
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="footer-visit" style="display: flex; justify-content: flex-start">
                                        <li style="display: flex">
                                            <i style="font-size: 23px; color: #ffffff; padding-right: 15px; position: relative; top: 25%"
                                                class="fa-solid fa-clock"></i>
                                        </li>
                                        <li>
                                            <a style="display: block" href="#">
                                                T2 - T6: 8:00am - 5:00pm
                                            </a>
                                            <a style="display: block" href="#">
                                                T7 - CN: 10:00am - 9:50pm
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Lựa chọn</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Lịch sử</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Phiếu quà tặng</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5 ">
                        <div class="single-widget" style="padding-left: 30px">
                            <h2>Liên hệ với chúng tôi</h2>
                            <form action="#" class="searchform">
                                <div style="background-color: #ffffff; display: flex">
                                    <input type="text" placeholder="Your email address" />
                                    <button type="submit" class=" btn-default"
                                        style="display: flex; align-item: center; justify-content: center">
                                        <i class="fa-solid fa-right-long"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="single-widget" style="padding-left: 30px; margin-top: 15px">
                            <h2> Khám phá:</h2>
                            <iframe width="100%" height=""
                                src="https://www.youtube.com/embed/rLrV5Tel7zw?start=1" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write;
                            encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2023 DucZunnn Inc. All rights reserved.</p>
                    <p class="pull-right">Copied by <span>DucZunnn</span></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0"
        nonce="2xCe8MZT"></script>

    <script src="{{ asset('frontend/js/html5shiv.js') }}"></script>

    <script src="{{ asset('frontend/js/respond.min.js') }}"></script>

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('frontend/js/sweetalert.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');

                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name = "_token"]').val();
                $.ajax({
                    url: '{{ url('/add-cart-ajax') }}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function(data) {
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{ url('/show-cart-ajax') }}";
                            });
                    }
                });
            });

            $('.chooses').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name = "_token"]').val();
                var result = '';

                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }

                $.ajax({
                    url: '{{ url('/select-delivery-home') }}',
                    method: 'POST',
                    data: {
                        "action": action,
                        "ma_id": ma_id,
                        "_token": _token,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });

            $('.caculate_delivery').click(function() {
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name = "_token"]').val();

                if (matp == '' && maqh == '' && xaid == '') {
                    alert('Chọn địa chỉ!');
                } else {
                    $.ajax({
                        url: '{{ url('/caculate-fee') }}',
                        method: 'POST',
                        data: {
                            "matp": matp,
                            "maqh": maqh,
                            "xaid": xaid,
                            "_token": _token,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                }
            });

            $('.send-order').click(function() {
                swal({
                        title: "Xác nhận đơn hàng?",
                        text: "Đơn hàng sẽ không được hủy sau khi đặt hàng!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Mua hàng!",
                        cancelButtonText: "Hủy!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            var id = $(this).data('id_product');
                            var shipping_email = $('.shipping_email').val();
                            var shipping_name = $('.shipping_name').val();
                            var shipping_address = $('.shipping_address').val();
                            var shipping_phone = $('.shipping_phone').val();
                            var shipping_note = $('.shipping_note').val();
                            var shipping_method = $('.payment_select').val();
                            var order_fee = $('.order_fee').val();
                            var order_coupon = $('.order_coupon').val();
                            var _token = $('input[name = "_token"]').val();
                            $.ajax({
                                url: '{{ url('/confirm-order') }}',
                                method: 'POST',
                                data: {
                                    shipping_email: shipping_email,
                                    shipping_name: shipping_name,
                                    shipping_address: shipping_address,
                                    shipping_phone: shipping_phone,
                                    shipping_note: shipping_note,
                                    order_fee: order_fee,
                                    shipping_method: shipping_method,
                                    order_coupon: order_coupon,
                                    _token: _token
                                },
                                success: function(data) {
                                    swal("Thành công!", "Bạn đã đặt hàng thành công.",
                                        "success");
                                }
                            });
                            window.setTimeout(() => {
                                location.reload();
                            }, 3000);
                        } else {
                            swal("Đóng", "Hủy thành công :)", "error");
                        }
                    });

            });
            var $grid = $('.grid').isotope({
                itemSelector: '.element-item',
                layoutMode: 'fitRows',
                // getSortData: {
                //     name: '.name',
                //     symbol: '.symbol',
                //     number: '.number parseInt',
                //     category: '[data-category]',
                //     weight: function(itemElem) {
                //         var weight = $(itemElem).find('.weight').text();
                //         return parseFloat(weight.replace(/[\(\)]/g, ''));
                //     }
                // }
            });

            // filter functions
            // var filterFns = {
            //     // show if number is greater than 50
            //     numberGreaterThan50: function() {
            //         var number = $(this).find('.number').text();
            //         return parseInt(number, 10) > 50;
            //     },
            //     // show if name ends with -ium
            //     ium: function() {
            //         var name = $(this).find('.name').text();
            //         return name.match(/ium$/);
            //     }
            // };

            // bind filter button click
            $('#filters').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                // use filterFn if matches value
                // filterValue = filterFns[filterValue] || filterValue;
                $grid.isotope({
                    filter: filterValue
                });
            });

            $('#filter').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                // use filterFn if matches value
                // filterValue = filterFns[filterValue] || filterValue;
                $grid.isotope({
                    filter: filterValue
                });
            });

            // bind sort button click
            // $('#sorts').on('click', 'button', function() {
            //     var sortByValue = $(this).attr('data-sort-by');
            //     $grid.isotope({
            //         sortBy: sortByValue
            //     });
            // });

            // change is-checked class on buttons
            $('.button-group').each(function(i, buttonGroup) {
                var $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click', 'button', function() {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $(this).addClass('is-checked');
                });
            });
        })
    </script>
</body>

</html>
