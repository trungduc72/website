@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb" >
                <li><a href={{ route('home') }}>Trang chủ</a></li>
                <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
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
                                            name="cart_quantity" value={{ $item->qty }} autocomplete="off" size="2"
                                            style="width: 40px">
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
    </section>
    <!--/#cart_items-->
    <section id="do_action">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.</p>
        </div>
        <div class="row">
            {{-- <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div> --}}
            <div class="col-sm-12">
                <div class="total_area">
                    <ul>
                        <li>Tổng <span>{{ Cart::priceTotal(0) . '' . 'VND' }}</span></li>
                        <li>Thuế <span>{{ Cart::tax(0) . '' . 'VND' }}</span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span>{{ Cart::total(0) . '' . 'VND' }}</span></li>
                    </ul>

                    <?php
                        $customer_id = Session::get('customer_id');
                        if($customer_id != null){
                    ?>
                    <a class="btn btn-default check_out" style="margin-left: 40px" href={{ route('checkout') }}>Thanh
                        toán</a>
                    <?php    
                    }
                    else{
                    ?>
                    <a class="btn btn-default check_out" style="margin-left: 40px" href={{ route('login-checkout') }}>Thanh
                        toán</a>
                    <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!--/#do_action-->
@endsection
