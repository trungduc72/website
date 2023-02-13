@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href={{ route('home') }}>Trang chủ</a></li>
                <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>
        <!--/breadcrums-->
        @if (Session::get('customer'))
            <div class="alert alert-success" role="alert">
                <p>Đăng nhập để dễ dàng thanh toán và xem lại lịch sử giao hàng!</p>
            </div>
        @else
            <div></div>
        @endif
        <!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Thông tin gửi hàng</p>
                        <div class="form-one" style="width: 100%">
                            <form  method="POST">
                                @csrf
                                <input type="text" name="shipping_email" class="shipping_email form-control" placeholder="Email*" >
                                @error('shipping_email')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror

                                <input type="text" name="shipping_name" class="shipping_name form-control" placeholder="Họ và tên *" >
                                @error('shipping_name')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror

                                <input type="text" name="shipping_address" class="shipping_address form-control" placeholder="Địa chỉ  *" >
                                @error('shipping_address')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror

                                <input type="text" name="shipping_phone" class="shipping_phone form-control" placeholder="Số điện thoại" >
                                @error('shipping_phone')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror

                                <textarea name="shipping_note" class="shipping_note form-control" placeholder="Ghi chú" rows="5"  style="margin: 15px 0"></textarea>
                                @error('shipping_note')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror

                                @if (Session::get('fee'))
                                    <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                                @else
                                    <input type="hidden" name="order_fee" class="order_fee" value="10000">
                                @endif

                                @if (Session::get('coupon'))
                                    @foreach (Session::get('coupon') as $item)
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="{{$item['coupon_code']}}">
                                    
                                    @endforeach
                                @else
                                    <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                @endif
                                <input type="hidden" name="order_fee" class="order_fee">

                                <div class=" mt-4 mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Chọn hình thức thanh toán</label>
                                    <select name="payment_select" id="province" class="form-control chooses province payment_select"
                                        id="exampleFormControlSelect1">
                                        <option value="0">Chuyển khoản</option>
                                        <option value="1">COD</option>
                                    </select>
                                </div>

                                <input type="button" value="Xác nhận đơn hàng" name="send-order" class="btn btn-primary send-order"
                                    style="padding: 15px">
                            </form>
                            <form>
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class=" mt-4 mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Chọn thành phố</label>
                                    <select name="city" id="city" class="form-control chooses city"
                                        id="exampleFormControlSelect1">
                                        <option value="">---Chọn tỉnh, thành phố---</option>
                                        @foreach ($city as $key => $ci)
                                            <option value="{{ $ci->matp }}">{{ $ci->name_tp }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class=" mt-4 mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Chọn quận huyện</label>
                                    <select name="province" id="province" class="form-control chooses province"
                                        id="exampleFormControlSelect1">
                                        <option value="">---Chọn quận huyện---</option>
                                    </select>
                                </div>

                                <div class=" mt-4 mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Chọn xã phường</label>
                                    <select name="wards" id="wards" class="form-control wards"
                                        id="exampleFormControlSelect1">
                                        <option value="">---Chọn xã phường---</option>
                                    </select>
                                </div>

                                <input type="button" value="Tính phí vận chuyển" name="caculate_order"
                                    class="btn btn-primary caculate_delivery" style="padding: 15px">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
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
                                                            // echo '<p><li>Tổng giảm: ' . number_format($total_coupon) . 'VND</li></p>';
                                                        @endphp
                                                    </p>
                                                    <p>
                                                        @php
                                                            $total_after_coupon = $total - $total_coupon;
                                                        @endphp
                                                    </p>
                                                @elseif($cou['coupon_condition'] == 2)
                                                    Mã giảm: {{ $cou['coupon_number'] }} VND
                                                    <p>
                                                        @php
                                                            $total_coupon = $total - $cou['coupon_number'];
                                                            // echo '<p><li>Tổng giảm: ' . number_format($total_coupon) . 'VND</li></p>';
                                                        @endphp
                                                    </p>
                                                    <p>
                                                        @php
                                                            $total_after_coupon = $total_coupon;
                                                        @endphp
                                                    </p>
                                                @endif
                                            @endforeach
                                        </li>
                                    @endif
                                    {{-- <li>Thuế: <span></span></li> --}}
                                    @if (Session::get('fee'))
                                        <li>
                                            <a class="cart_quantity_delete" href="{{ url('delete-fee/') }}"><i
                                                    class="fa fa-times"></i></a>
                                            Phí vận chuyển: <span>{{ number_format(Session::get('fee')) }} VND</span>
                                            @php
                                                $total_after_fee = $total - Session::get('fee');
                                            @endphp
                                        </li>
                                    @endif

                                    <li>Tổng còn: <span>
                                            @php
                                                if (Session::get('fee') && !Session::get('coupon')) {
                                                    $total_after = $total_after_fee;
                                                    echo number_format($total_after);
                                                } elseif (!Session::get('fee') && Session::get('coupon')) {
                                                    $total_after = $total_after_coupon;
                                                    echo number_format($total_after);
                                                } elseif (Session::get('fee') && Session::get('coupon')) {
                                                    $total_after = $total_after_coupon;
                                                    $total_after = $total_after - Session::get('fee');
                                                    echo number_format($total_after);
                                                } elseif (!Session::get('fee') && !Session::get('coupon')) {
                                                    $total_after = $total;
                                                    echo number_format($total_after);
                                                }
                                            @endphp
                                        </span></li>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="">Thanh toán</a>
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
                                <input type="text" class="form-control" placeholder="Nhập mã giảm giá"
                                    name="coupon">
                                <input type="submit" class="btn btn-primary" name="check_coupon" href=""
                                    value="Tính mã giảm giá">

                                @if (Session::get('coupon'))
                                    <a class="cart_quantity_delete btn btn-primary" href="{{ url('unset-coupon/') }}">
                                        Xóa mã giảm giá</a>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endif
            </table>
        </div>
    </section>
    <!--/#cart_items-->
@endsection
