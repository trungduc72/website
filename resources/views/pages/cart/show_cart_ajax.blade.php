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
                                </td>
                                <td>
                                    <a class="cart_quantity_delete btn btn-primary"
                                        href="{{ url('delete-all-cart-product/') }}"> Xóa tất cả</a>
                                </td>
                                <td>
                                    <li>Tổng: <span>{{ number_format($total) }}VND</span></li>
                                    <li>Thuế: <span></span></li>
                                    <li>Phí vận chuyển: <span>Free</span></li>
                                    <li>Tổng cộng: <span></span></li>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="">Thanh toán</a>
                                    {{-- <a class="btn btn-primary" href="">Tính mã giảm giá</a> --}}
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
            </table>
        </div>
    </section>
    <!--/#cart_items-->
    {{-- <section id="do_action">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="total_area">
                    <ul>
                        <li>Tổng <span>{{ number_format($total) }}</span></li>
                        <li>Thuế <span></span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Tổng cộng <span></span></li>
                    </ul>

                    <a class="btn btn-default check_out" style="margin-left: 40px" href="">Thanh
                        toán</a>

                </div>
            </div>
        </div>
    </section> --}}
    <!--/#do_action-->
@endsection
