@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center" style="margin-top: 10px">SẢN PHẨM MỚI </h2>
        @foreach ($all_product as $item)
            <div class="col-sm-4 ">
                <div class="product-image-wrapper ">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ URL::to('upload/product/' . $item->product_image) }}" alt=""
                                style="width: 100%; max-height: 250px" />
                            <h2>{{ number_format($item->product_price) }}đ</h2>
                            <p>{{ $item->product_name }}</p>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{ $item->product_id }}"
                                        class="cart_product_id_{{ $item->product_id }}" />
                                    <input type="hidden" value="{{ $item->product_name }}"
                                        class="cart_product_name_{{ $item->product_id }}" />
                                    <input type="hidden" value="{{ $item->product_image }}"
                                        class="cart_product_image_{{ $item->product_id }}" />
                                    <input type="hidden" value="{{ $item->product_quantity }}"
                                        class="cart_product_quantity_{{ $item->product_id }}" />
                                    <input type="hidden" value="{{ $item->product_price }}"
                                        class="cart_product_price_{{ $item->product_id }}" />
                                    <input type="hidden" value="1"
                                        class="cart_product_qty_{{ $item->product_id }}" />

                                    <a href='/detail/{{ $item->product_id }}'>
                                        <img src="{{ URL::to('upload/product/' . $item->product_image) }}" alt=""
                                            style="width: 100%" />
                                        <h2>{{ number_format($item->product_price) }}đ</h2>
                                        <p>{{ $item->product_name }}</p>
                                    </a>

                                    <button type="button" class="btn btn-default add-to-cart"
                                        data-id_product="{{ $item->product_id }}"><i class="fa fa-shopping-cart"></i>Add
                                        to cart</button>
                                </form>
                            </div>
                        </div>
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
    <!--features_items-->
@endsection
