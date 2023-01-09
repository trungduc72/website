@extends('layout')

@section('title')
    @foreach ($category_name as $item)
        {{ $item->category_name }}
    @endforeach
@endsection

@section('content')
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center" style="margin-top: 10px"> @yield('title') </h2>
        @foreach ($category_by_id as $item)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ URL::to('upload/product/' . $item->product_image) }}" alt=""
                                style="max-height: 250px" />
                            <h2>{{ number_format($item->product_price) }}VND</h2>
                            <p>{{ $item->product_name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                cart</a>
                        </div>
                        <a href='/detail/{{ $item->product_id }}'>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <img src="{{ URL::to('upload/product/' . $item->product_image) }}" alt=""
                                        style="width: 100%" />
                                    <h2>{{ number_format($item->product_price) }}VND</h2>
                                    <p>{{ $item->product_name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add
                                        to cart</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a>
                            </li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection