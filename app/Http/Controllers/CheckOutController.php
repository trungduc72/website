<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckOutController extends Controller
{
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

        $customer_id = DB::table('customer')->insertgetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);

        return redirect('login-checkout');
    }

    public function checkout()
    {
        $title = 'Thanh toán';
        $cate_product = DB::table('category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->orderby('brand_id', 'desc')->get();

        return view('pages.checkout.checkout', compact('title'))
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
            'shipping_note.required' => 'Vui lòng nhập ghi chú!'
        ]);

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('shipping')->insertgetId($data);

        Session::put('shipping_id', $shipping_id);

        return redirect('login-checkout');
    }

    public function logoutCheckout()
    {
        Session::flush();

        return redirect('home');
    }
}
