@extends('adminLayout')
@section('title')
    {{ $title }}
@endsection
@section('admin_content')
    <div class="card">
        <div class="alert alert-primary text-center text-uppercase text-s mb-0" style="color: white; ">
            Thông tin khách hàng
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 ">Tên khách hàng
                        </th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 ">Số điện thoại
                        </th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 ">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">{{ $customer->customer_name }}</h6>
                                    <p class="text-xs text-secondary mb-0"></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <p class="text-xs font-weight-bold mb-0">{{ $customer->customer_phone }}</p>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <p class="text-xs font-weight-bold mb-0">{{ $customer->customer_email }}</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br> <br> <br>
    <div class="card">
        <div class="alert alert-primary text-center text-uppercase text-s mb-0" style="color: white">
            Thông tin vận chuyển
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 ">Tên người nhận
                        </th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 ">Địa chỉ</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 ">Số điện thoại
                        </th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 ">Email</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 ">Hình thức thanh
                            toán</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2 ">Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs">{{ $shipping->shipping_name }}</h6>
                                    <p class="text-xs text-secondary mb-0"></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <p class="text-xs font-weight-bold mb-0">{{ $shipping->shipping_address }}</p>
                            </div>
                        </td>
                        <td>
                            <span class="text-ellipsis">
                                <span class='text-dark text-xs'>{{ $shipping->shipping_phone }}</span>
                            </span>
                        </td>
                        <td>
                            <span class="text-ellipsis">
                                <span class='text-dark text-xs'>{{ $shipping->shipping_email }}</span>
                            </span>
                        </td>
                        <td>
                            <span class="text-ellipsis">
                                <span class='text-dark text-xs'>
                                    @if ($shipping->shipping_method == 0)
                                        Chuyển khoản
                                    @else
                                        COD
                                    @endif
                                </span>
                            </span>
                        </td>
                        <td>
                            <span class="text-ellipsis">
                                <span class='text-dark text-xs'>{{ $shipping->shipping_note }}</span>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br> <br> <br>
    <div class="card">
        <div class="alert alert-primary text-center text-uppercase text-s mb-0" style="color: white">
            Chi tiết đơn hàng
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">STT</th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">Tên sản phẩm
                        </th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">Số lượng kho
                        </th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">Mã giảm giá</th>
                        {{-- <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">Phí ship</th> --}}
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">Số lượng</th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">Giá sản phẩm
                        </th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                        $total = 0;
                    @endphp
                    @foreach ($order_detail as $item)
                        @php
                            $i++;
                            $sub_total = $item->product_price * $item->product_qty;
                            $total += $sub_total;
                        @endphp
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <p class="text-xs font-weight-bold mb-0">{{ $i }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $item->product_name }}</h6>
                                        <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $item->product->product_quantity }}</h6>
                                        <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <p class="text-xs font-weight-bold mb-0">
                                        @if ($item->product_coupon != 'no')
                                            {{ $item->product_coupon }}
                                        @else
                                            Không có mã giảm giá
                                        @endif
                                    </p>
                                </div>
                            </td>
                            {{-- <td>
                                <div class="d-flex px-2 py-1">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->product_feeship }}</p>
                                </div>
                            </td> --}}
                            <td>
                                <div class="d-flex px-2 py-1">
                                    {{-- <p class="text-xs font-weight-bold mb-0"> --}}
                                    <div class="input-group input-group-static" style="width: 50px">
                                        <input type="number"
                                            class="form-control mb-4 mx-2 order_qty_{{ $item->product_id }}" min="1"
                                            value="{{ $item->product_qty }}" name="product_sales_quantity">
                                        
                                        <input type="hidden" name="order_code" class="order_code"
                                            value="{{ $item->order_code }}">

                                        <input type="hidden" name="order_product_id" class="order_product_id"
                                            value="{{ $item->product_id }}">
                                    </div>
                                    <button class="btn btn-primary btn-sm update_quantity_order"
                                        data-product_id="{{ $item->product_id }}" name="update_quantity_order">Cập
                                        nhật</button>
                                    {{-- </p> --}}
                                </div>
                            </td>
                            <td>
                                <span class="text-ellipsis">
                                    <span class='text-dark text-xs'>{{ number_format($item->product_price) }}VND</span>
                                </span>
                            </td>
                            <td>
                                <span class="text-ellipsis">
                                    <span class='text-dark text-xs'>{{ number_format($sub_total) }}VND</span>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h6 class='text-xs mb-0'>Tổng tiền:</h6>
                        </td>
                        <td>
                            <span class="text-ellipsis">
                                <h6 class='text-xs mb-0'>{{ number_format($total) }}VND</h6>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h6 class='text-xs mb-0'>Tổng giảm:</h6>
                        </td>
                        <td>
                            <span class="text-ellipsis">
                                <h6 class='text-xs mb-0'>
                                    @php
                                        $total_coupon = 0;
                                    @endphp
                                    @if ($coupon_condition == 1)
                                        @php
                                            $total_coupon = $total - ($total * $coupon_number) / 100;
                                            echo number_format(($total * $coupon_number) / 100) . 'VND(' . $coupon_number . ' %)';
                                        @endphp
                                    @else
                                        @php
                                            $total_coupon = $total - $coupon_number;
                                            echo number_format($coupon_number) . 'VND';
                                        @endphp
                                    @endif
                                </h6>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h6 class='text-xs mb-0'>Phí ship:</h6>
                        </td>
                        <td>
                            <span class="text-ellipsis">
                                <h6 class='text-xs mb-0'>{{ number_format($item->product_feeship) }}VND</h6>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h6 class='text-xs mb-0'>Thành tiền: </h6>
                        </td>
                        <td>
                            <span class="text-ellipsis">
                                <h6 class='text-xs mb-0'>{{ number_format($total_coupon + $item->product_feeship) }} VND
                                </h6>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="5">
                            @foreach ($order as $or)
                                @if ($or->order_status == 1)
                                    <form>
                                        @csrf
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">Trạng thái</label>
                                            <select name="product_status" class="form-control order_details"
                                                id="exampleFormControlSelect1">
                                                <option value="0">---Chọn hình thức đơn hàng---</option>
                                                <option id="{{ $or->order_id }}" selected value="1">Chưa xử lí
                                                </option>
                                                <option id="{{ $or->order_id }}" value="2">Đã xử lí - Đã giao hàng
                                                </option>
                                                <option id="{{ $or->order_id }}" value="3">Hủy đơn hàng - Tạm giữ
                                                </option>
                                            </select>
                                        </div>
                                    </form>
                                @elseif ($or->order_status == 2)
                                    <form>
                                        @csrf
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">Trạng thái</label>
                                            <select name="product_status" class="form-control order_details"
                                                id="exampleFormControlSelect1">
                                                <option value="0">---Chọn hình thức đơn hàng---</option>
                                                <option id="{{ $or->order_id }}" value="1">Chưa xử lí</option>
                                                <option id="{{ $or->order_id }}" selected value="2">Đã xử lí - Đã
                                                    giao hàng</option>
                                                <option id="{{ $or->order_id }}" value="3">Hủy đơn hàng - Tạm giữ
                                                </option>
                                            </select>
                                        </div>
                                    </form>
                                @else
                                    <form>
                                        @csrf
                                        <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">Trạng thái</label>
                                            <select name="product_status" class="form-control order_details"
                                                id="exampleFormControlSelect1">
                                                <option value="0">---Chọn hình thức đơn hàng---</option>
                                                <option id="{{ $or->order_id }}" value="1">Chưa xử lí</option>
                                                <option id="{{ $or->order_id }}" value="2">Đã xử lí - Đã giao hàng
                                                </option>
                                                <option id="{{ $or->order_id }}" selected value="3">Hủy đơn hàng -
                                                    Tạm giữ</option>
                                            </select>
                                        </div>
                                    </form>
                                @endif
                            @endforeach

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="text-ellipsis">
                                <a target="_blank" href="{{ url('print-order/' . $item->order_code) }}">
                                    <h6 class='text-xs mb-0'>In hóa đơn</h6>
                                </a>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
