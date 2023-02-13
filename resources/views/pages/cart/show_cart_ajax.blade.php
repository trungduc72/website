@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href={{ route('home') }}>Trang chủ</a></li>
                <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
        @php
            $mess = Session::get('message');
            if ($mess) {
                echo '<div class="alert alert-success" role="alert"><p>' . $mess . '</p></div>';
                Session::put('message', null);
            }
        @endphp
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Thành tiền</td>
                        <td>Xóa</td>
                    </tr>
                </thead>
                <form action='update-cart/' method="POST">
                    @csrf
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @if (Session::get('cart'))
                            @foreach (Session::get('cart') as $item)
                                @php
                                    $subtotal = $item['product_price'] * $item['product_qty'];
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td class="cart_product">
                                        <a href=""><img
                                                src="{{ asset('/upload/product/' . $item['product_image']) }}"
                                                alt="" width="50px"></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""></a></h4>
                                        <p>{{ $item['product_name'] }} </p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ number_format($item['product_price']) }}VND</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <input class="cart_quantity" type="number" min="1"
                                                name="cart_qty[{{ $item['session_id'] }}]"
                                                value="{{ $item['product_qty'] }}" autocomplete="off" size="2"
                                                style="width: 40px">
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">
                                            {{ number_format($subtotal) }}
                                        </p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete"
                                            href="{{ url('delete-cart-product/' . $item['session_id']) }}"><i
                                                class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <input type="submit" value="Cập nhật " name="update_qty" class="btn btn-primary">

                                    <a class="cart_quantity_delete btn btn-primary"
                                        href="{{ url('delete-all-cart-product/') }}"> Xóa tất cả</a>
                                </td>
                                <td>
                                    <li>Tổng: <span>{{ number_format($total) }} VND</span></li>
                                    @if (Session::get('coupon'))
                                        <li>
                                            @foreach (Session::get('coupon') as $item => $cou)
                                                @if ($cou['coupon_condition'] == 1)
                                                    Mã giảm: {{ $cou['coupon_number'] }} %
                                                    <p>
                                                        @php
                                                            $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                            echo '<p><li>Tổng giảm: ' . number_format($total_coupon) . 'VND</li></p>';
                                                        @endphp
                                                    </p>
                                                    <p>
                                        <li>Tổng: {{ number_format($total - $total_coupon) }} VND</li>
                                        </p>
                                    @elseif($cou['coupon_condition'] == 2)
                                        Mã giảm: {{ $cou['coupon_number'] }} VND
                                        <p>
                                            @php
                                                $total_coupon = $total - $cou['coupon_number'];
                                                
                                            @endphp
                                        </p>
                                        <p>
                                            <li>Tổng: {{ number_format($total_coupon) }} VND</li>
                                        </p>
                                    @endif
                                @endforeach
                            </li>
                        @endif
                        {{-- <li>Thuế: <span></span></li>
                                    <li>Phí vận chuyển: <span>Free</span></li> --}}
                        {{-- <li>Tổng cộng: <span></span></li> --}}
                        </td>
                        <td>
                            @if (Session::get('customer'))
                                <a class="btn btn-primary" href="{{ route('checkout') }}">Đặt hàng</a>
                            @else   
                                <a class="btn btn-primary" href="{{ route('login-checkout') }}">Đặt hàng</a>
                            @endif
                        </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="2">
                                <p>Không có sản phẩm nào trong giỏ hàng</p>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </form>
                @if (Session::get('cart'))
                    <tr>
                        <td colspan="2">
                            <form method="POST" action="{{ url('/check-coupon') }}">
                                @csrf
                                <input type="text" class="form-control" placeholder="Nhập mã giảm giá" name="coupon">
                                <input type="submit" class="btn btn-primary" name="check_coupon" href=""
                                    value="Tính mã giảm giá">
                                
                                @if (Session::get('coupon'))
                                    <a class="cart_quantity_delete btn btn-primary"
                                        href="{{ url('unset-coupon/') }}"> Xóa mã giảm giá</a>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </section>
@endsection
