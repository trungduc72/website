@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @foreach ($detail as $item)
        <div class="product-details">
            <!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{ URL::to('/upload/product/' . $item->product_image) }}" alt="" />
                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href=""><img src="{{ URL::to('/upload/product/' . $item->product_image) }}"
                                    style="width: 40px" alt=""></a>
                            <a href=""><img src="{{ URL::to('/upload/product/' . $item->product_image) }}"
                                    style="width: 40px" alt=""></a>
                            <a href=""><img src="{{ URL::to('/upload/product/' . $item->product_image) }}"
                                    style="width: 40px" alt=""></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="{{ URL::to('/upload/product/' . $item->product_image) }}"
                                    style="width: 40px" alt=""></a>
                            <a href=""><img src="{{ URL::to('/upload/product/' . $item->product_image) }}"
                                    style="width: 40px" alt=""></a>
                            <a href=""><img src="{{ URL::to('/upload/product/' . $item->product_image) }}"
                                    style="width: 40px" alt=""></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="{{ URL::to('/upload/product/' . $item->product_image) }}"
                                    style="width: 40px" alt=""></a>
                            <a href=""><img src="{{ URL::to('/upload/product/' . $item->product_image) }}"
                                    style="width: 40px" alt=""></a>
                            <a href=""><img src="{{ URL::to('/upload/product/' . $item->product_image) }}"
                                    style="width: 40px" alt=""></a>
                        </div>

                    </div>

                    <!-- Controls -->
                    <a class="left item-control" href="#similar-product" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#similar-product" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <!--/product-information-->
                    <img src="{{ asset('frontend/images/product-details/new.jpg') }}" class="newarrival" alt="" />
                    <h2>{{ $item->product_name }}</h2>
                    <p>Mã ID: {{ $item->product_id }}</p>
                    <img src="{{ asset('frontend/images/product-details/rating.png') }}" alt="" />
                    <form >
                        @csrf
                        <span>
                            <input type="hidden" value="{{ $item->product_id }}"  class="cart_product_id_{{ $item->product_id }}" />
                            <input type="hidden" value="{{ $item->product_name }}" 
                                    class="cart_product_name_{{ $item->product_id }}" />
                            <input type="hidden" value="{{ $item->product_image }}" 
                                    class="cart_product_image_{{ $item->product_id }}" />
                            <input type="hidden" value="{{ $item->product_price }}" 
                                    class="cart_product_price_{{ $item->product_id }}" />
    
                            <div>
                                <span>{{ number_format($item->product_price) }}VND</span>
                            </div>
                            <div>
                                <label>Số lượng:</label>
                                <input name="qty" type="number" value="1" min="1" class="cart_product_qty_{{ $item->product_id }}"/>
                            </div>
    
                            <div>
                                <button type="button" class="btn btn-fefault cart add-to-cart" data-id_product="{{ $item->product_id }}" style="margin: 20px 0; "><i
                                        class="fa fa-shopping-cart"></i>Add
                                    to cart</button>
                            </div>

                        </span>
                    </form>
                    <p><b>Tình trạng:</b> Còn hàng</p>
                    <p><b>Danh mục:</b> {{ $item->category_name }}</p>
                    <p><b>Thương hiệu:</b> {{ $item->brand_name }}</p>
                    <a href=""><img src="{{ asset('frontend/images/product-details/share.png') }}"
                            class="share img-responsive" alt="" /></a>

                    <div class="fb-share-button" data-href="http://127.0.0.1:8000/home" data-layout="button"
                        data-size="small"><a target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ $url_canonical }}&amp;src=sdkpreparse"
                            class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->

        <div class="category-tab shop-details-tab">
            <!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Chi tiết</a></li>
                    <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details">
                    {{ $item->product_desc }}
                </div>

                <div class="tab-pane fade" id="companyprofile">
                    {{ $item->product_content }}
                </div>

                <div class="tab-pane fade" id="reviews">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                            <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore
                            et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur.</p>
                        <p><b>Write Your Review</b></p>

                        <form action="#">
                            <span>
                                <input type="text" placeholder="Your Name" />
                                <input type="email" placeholder="Email Address" />
                            </span>
                            <textarea name=""></textarea>
                            <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                            <button type="button" class="btn btn-default pull-right">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!--/category-tab-->
    @endforeach

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">Sản phẩm liên quan</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach ($related as $item)
                        <div class="col-sm-4">
                            <a href='/detail/{{ $item->product_id }}'>
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ URL::to('/upload/product/' . $item->product_image) }}"
                                                alt="" style="max-height: 150px" />
                                            <h2>{{ number_format($item->product_price) }}VND</h2>
                                            <p>{{ $item->product_name }}</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <a>
                        </div>
                    @endforeach
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->
@endsection
