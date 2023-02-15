<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Product;
use PDF;

class OrderController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('admin.dashboard');
        }
        else return redirect('admin-login')->send();
    }

    public function manageOrder()
    {
        $this->AuthLogin();
        $title = 'Quản lí đơn hàng';

        $order = Order::orderby('created_at', 'DESC')->get();

        return view('admin.manage_order', compact('title', 'order'));
    }

    public function viewOrder($order_code)
    {
        $this->AuthLogin();
        $title = 'Chi tiết đơn hàng';

        $order_detail = OrderDetails::where('order_code', $order_code)->get();
        $order = Order::where('order_code', $order_code)->get();
        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $order_detail = OrderDetails::with('product')->where('order_code', $order_code)->get();

        foreach ($order_detail as $key => $value) {
            $product_coupon = $value->product_coupon;
        }
        
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
        }
        
        return view('admin.view_order', compact('title', 'order', 'order_detail', 'customer', 'shipping', 'coupon_condition', 'coupon_number'));
    }

    public function printOrder($checkout_code)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }

    public function print_order_convert($checkout_code)
    {
        $order_detail = OrderDetails::where('order_code', $checkout_code)->get();
        $order = Order::where('order_code', $checkout_code)->get();
        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $order_detail = OrderDetails::with('product')->where('order_code', $checkout_code)->get();

        foreach ($order_detail as $key => $value) {
            $product_coupon = $value->product_coupon;
        }
        
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
        }

        $output = '';
        $output .= 
        '<style>
            body{
                font-family: Dejavu Sans;   
            }
            .table-styling{
                border: 1px solid #000000;
                margin: 0 auto;
            }
            .table-styling tbody{
                border-top: 1px solid #000000;
            }
        </style>
        <h1><center>Công ty TNHH DucZunnn</center></h1>
        <br>
        <p>Thông tin người mua</p>
        <table class="table-styling">
            <thead>
                <tr>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> '.$customer->customer_name.' </td>
                    <td> '.$customer->customer_phone.' </td>
                    <td> '.$customer->customer_email.' </td>
                </tr>
            </tbody>
        </table>
        <p>Thông tin người nhận</p>
        <table class="table-styling">
            <thead>
                <tr>
                    <th>Tên người nhận</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> '.$shipping->shipping_name.' </td>
                    <td> '.$shipping->shipping_address.' </td>
                    <td> '.$shipping->shipping_phone.' </td>
                    <td> '.$shipping->shipping_email.' </td>
                    <td> '.$shipping->shipping_note.' </td>
                </tr>
            </tbody>
        </table>
        <p>Thông tin đơn hàng</p>
        <table class="table-styling">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Mã giảm giá</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>';
        
        $total = 0;
        $total_coupon = 0;
        foreach ($order_detail as $key => $value) {
            $subtotal = $value->product_price * $value->product_qty;
            $total += $subtotal;

            if ($value->product_coupon != 'no') {
                $product_coupon = $value->product_coupon;
            } else {
                $product_coupon = "Không có mã";
            }
            
            $output .= '
                <tr>
                    <td> '.$value->product_name.' </td>
                    <td> '.$product_coupon.' </td>
                    <td> '.$value->product_qty.' </td>
                    <td> '.number_format($value->product_price).' VND</td>
                    <td> '.number_format($subtotal).' VND</td>
                </tr>';
        }
        if ($coupon_condition == 1){
            $total_coupon = ($total * $coupon_number)/100;
        } else {
            $total_coupon = $coupon_number;
        }
        $output .= '
                <tr>
                    <td></td><td></td><td></td>
                    <td>
                        <p>Tổng cộng: </p>
                        <p>Tổng giảm: </p>
                        <p>Phí ship: </p>
                        <p>Thanh toán: </p>
                    </td>
                    <td>
                        <p>'.number_format($total).'VND</p>
                        <p>'.number_format($total_coupon).'VND</p>
                        <p>'.number_format($value->product_feeship).'VND</p>
                        <p>'.number_format($total - $total_coupon + $value->product_feeship).'VND</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <p>Kí tên</p>
        <table>
            <thead>
                <tr>
                    <th style="width: 200px">Người lập phiếu</th>
                    <th style="width: 800px">Người nhận</th>
                </tr>
            </thead>
        </table>';
        return $output;
    }

    public function updateOrderQty(Request $request)
    {
        $data = $request->all();

        $order = Order::find($data['order_id']);
        $order->order_status = $data["order_status"];
        $order->save();

        if ($order->order_status == 2) {
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach ($data['quantity'] as $key2 => $qty) {
                    if($key == $key2){
                        $pro_remain = $product_quantity - $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold +$qty;
                        $product->save();
                    }
                }
            }
        }
    }

    public function updateQty(Request $request)
    {
        $data = $request->all();
        $order_details = OrderDetails::where('product_id', $data['order_product_id'])->where('order_code', $data['order_code'])->first();

        $order_details->product_qty = $data['order_qty'];
        $order_details->save();

    }
}
