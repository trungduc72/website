@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb" >
                <li><a href={{ route('home') }}>Trang chủ</a></li>
                <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>
        <!--/breadcrums-->

        <div class="alert alert-success" role="alert">
            <p>Đăng nhập để dễ dàng thanh toán và xem lại lịch sử giao hàng!</p>
        </div>
        <!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Thông tin gửi hàng</p>
                        <div class="form-one" style="width: 100%">
                            <form action={{ route('save-checkout-customer') }} method="POST">
                                @csrf
                                <input type="text" name="shipping_email" placeholder="Email*" class="form-control">
                                @error('shipping_email')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror

                                <input type="text" name="shipping_name" placeholder="Họ và tên *" class="form-control">
                                @error('shipping_name')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror

                                <input type="text" name="shipping_address" placeholder="Địa chỉ  *" class="form-control">
                                @error('shipping_address')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror

                                <input type="text" name="shipping_phone" placeholder="Số điện thoại" class="form-control">
                                @error('shipping_phone')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                                
                                <textarea name="shipping_note" placeholder="Ghi chú" rows="16" class="form-control" style="margin: 15px 0"></textarea>
                                @error('shipping_note')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror

                                <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm"
                                    style="padding: 15px">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>

        <div class="payment-options">
            <span>
                <label><input type="checkbox"> Direct Bank Transfer</label>
            </span>
            <span>
                <label><input type="checkbox"> Check Payment</label>
            </span>
            <span>
                <label><input type="checkbox"> Paypal</label>
            </span>
        </div>

    </section>
    <!--/#cart_items-->
@endsection
