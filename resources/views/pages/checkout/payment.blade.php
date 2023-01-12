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

        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Mô tả</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng tiền</td>
                            <td>Xóa</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $item)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{ URL::to('/upload/product/' . $item->options->image) }}"
                                            alt="" width="50px"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $item->name }}</a></h4>
                                    <p>Mã ID: {{ $item->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($item->price) }}VND</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form action='update-cart-qty/{{ $item->rowId }}' method="POST">
                                            @csrf
                                            <input class="cart_quantity_input" type="number" min="1"
                                                name="cart_quantity" value={{ $item->qty }} autocomplete="off"
                                                size="2" style="width: 40px">
                                            <input type="hidden" value={{ $item->rowId }} name="rowId_cart"
                                                class="form-control">
                                            <input type="submit" value="Cập nhật" name="update_qty"
                                                class="btn btn-primary btn-sm" style="margin-top: 0">
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">
                                        <?php
                                        $subtotal = $item->price * $item->qty;
                                        echo number_format($subtotal) . '' . 'VND';
                                        ?>
                                    </p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="delete-cart/{{ $item->rowId }}"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="payment-options">
            <h4>Chọn phương thức thanh toán</h4>
            <form action={{ route('order-place') }} method="POST">
                @csrf
                <span>
                    <label><input name="payment_option" value="1" type="checkbox"> Thẻ ATM</label>
                </span>
                <span>
                    <label><input name="payment_option" value="2" type="checkbox"> Ship COD</label>
                </span>
                <span>
                    <label><input name="payment_option" value="3" type="checkbox"> Paypal</label>
                </span>
                @error('payment_option')
                    <span style="color: red">{{ $message }}</span>
                @enderror
                <div>
                    <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm"
                        style="padding: 15px">
                </div>
            </form>
        </div>

    </section>
    <!--/#cart_items-->
@endsection
