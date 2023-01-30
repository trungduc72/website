<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;

class CheckOutController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('admin.dashboard');
        }
        else return redirect('admin-login')->send();
    }

    public function loginCheckOut()
    {
        
        return view('pages.checkout.login_checkout');
    }

    public function loginCustomer(Request $request)
    {
        $email = $request->customer_email;
        $password = md5($request->customer_password);

        $result = DB::table('customer')->where('customer_email', $email)
                    ->where('customer_password', $password)->first();
            
                    
        if($result){
            Session::put('customer_id', $result->customer_id);
            return redirect('checkout');
        }
        else return redirect('login-checkout');
    }

    public function signup()
    {
        
        return view('pages.checkout.signup');
    }

    public function addCustomer(Request $request)
    {
        $validate = $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
            'customer_password' => 'required',
            'customer_cf_password' => 'required|same:customer_password'
        ], [
            'customer_name.required' => 'Vui lòng nhập họ và tên!',
            'customer_email.required' => 'Vui lòng nhập email!',
            'customer_phone.required' => 'Vui lòng nhập số điện thoại!',
            'customer_password.required' => 'Vui lòng nhập mật khẩu!',
            'customer_cf_password.required' => 'Vui lòng nhập lại mật khẩu!',
            'customer_cf_password.same' => 'Vui lòng nhập đúng mật khẩu!'
        ]);

        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('customer')->insertGetId($data);
        
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);

        return redirect('login-checkout');
    }

    public function checkout(Request $request)
    {
        $title = 'Thanh toán';
        $meta_desc = "Thanh toán";
        $meta_keywords = "Thanh toán";
        $url_canonical = $request->url();

        $cate_product = DB::table('category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->orderby('brand_id', 'desc')->get();

        return view('pages.checkout.checkout', compact('title', 'meta_desc', 'url_canonical', 'meta_keywords'))
                ->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function saveCheckoutCustomer(Request $request)
    {
        $validate = $request->validate([
            'shipping_name' => 'required',
            'shipping_email' => 'required',
            'shipping_phone' => 'required',
            'shipping_address' => 'required',
            'shipping_note' => 'required'
        ], [
            'shipping_name.required' => 'Vui lòng nhập họ và tên!',
            'shipping_email.required' => 'Vui lòng nhập email!',
            'shipping_phone.required' => 'Vui lòng nhập số điện thoại!',
            'shipping_note.required' => 'Vui lòng nhập ghi chú!',
            'shipping_address.required' => 'Vui lòng nhập địa chỉ!'
        ]);

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);

        return redirect('payment');
    }

    public function payment(Request $request)
    {
        $title = 'Thanh toán';
        $meta_desc = "Thanh toán";
        $meta_keywords = "Thanh toán";
        $url_canonical = $request->url();

        $cate_product = DB::table('category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->orderby('brand_id', 'desc')->get();

        return view('pages.checkout.payment', compact('title', 'meta_desc', 'url_canonical', 'meta_keywords'))
                ->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function orderPlace(Request $request)
    {
        $title = 'Đặt hàng';
        $cate_product = DB::table('category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->orderby('brand_id', 'desc')->get();

        // $validate = $request->validate([
        //     'payment_method' => 'required'
        // ], [
        //     'payment_method.required' => 'Vui lòng chọn phương thức thanh toán!'
        // ]);

        //nhập hình thức thanh toán
        $payment_data = array();
        $payment_data['payment_method'] = $request->payment_option;
        $payment_data['payment_status'] = 'Đang chờ xử lí';

        $payment_id = DB::table('payment')->insertGetId($payment_data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lí';

        $order_id = DB::table('order')->insertGetId($order_data);

        //inset oder detail
        $content = Cart::content();
        foreach($content as $con){
            $order_detail_data = array();
            $order_detail_data['order_id'] = $order_id;
            $order_detail_data['product_id'] = $con->id;
            $order_detail_data['product_name'] = $con->name;
            $order_detail_data['product_price'] = $con->price;
            $order_detail_data['product_qty'] = $con->qty;
    
            $order_detail_id = DB::table('order_detail')->insert($order_detail_data);
        }

        if($payment_data['payment_method'] == 1){
            echo '1';
        }elseif ($payment_data['payment_method'] == 2) {
            Cart::destroy();
            return view('pages.checkout.handcash', compact('title'))
            ->with('category', $cate_product)->with('brand', $brand_product);
        }else{
            echo '3';
        }

        // return redirect('payment');
    }

    public function logoutCheckout()
    {
        Session::flush();

        return redirect('home');
    }

    public function manageOrder()
    {
        $this->AuthLogin();
        $title = 'Quản lí đơn hàng';

        $all_order = DB::table('order')
                        ->join('customer', 'order.customer_id','=','customer.customer_id')
                        ->select('order.*', 'customer.customer_name')
                        ->orderby('order.order_id', 'desc')->get();
        $manager_order = view('admin.manage_order', compact('title'))
                                    ->with('all_order', $all_order);

        return view('adminLayout')->with('manager_order', $manager_order);
    }

    public function viewOrder($orderId)
    {
        $this->AuthLogin();
        $title = 'Chi tiết đơn hàng';

        $order_by_id = DB::table('order')
                        ->join('customer', 'order.customer_id','=','customer.customer_id')
                        ->join('shipping', 'order.shipping_id','=','shipping.shipping_id')
                        ->join('order_detail', 'order.order_id','=','order_detail.order_id')
                        ->select('order.*', 'customer.*', 'shipping.*', 'order_detail.*')->first();
        $manager_order_by_id = view('admin.view_order', compact('title'))
                                    ->with('order_by_id', $order_by_id);

        return view('adminLayout')->with('admin.view_order', $manager_order_by_id);
    }

}
