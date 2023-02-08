<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;
use App\Models\Coupon;

class CartController extends Controller
{
    public function saveCart(Request $request)
    {
        $title = 'Giỏ hàng';

        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('product')->where('product_id', $productId)->first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // $data['id'] = $product_info->product_id;
        // $data['qty'] = $quantity;
        // $data['name'] = $product_info->product_name;
        // $data['price'] = $product_info->product_price;
        // $data['weight'] = $product_info->product_price;
        // $data['options']['image'] = $product_info->product_image;
        // Cart::add($data);
        // Cart::setGlobalTax(10);
        Cart::destroy();
        return redirect('show-cart');
    }

    public function showCart(Request $request)
    {
        $title = 'Giỏ hàng';
        $meta_desc = "Giỏ hàng";
        $url_canonical = $request->url();

        $cate_product = DB::table('category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        return view('pages.cart.show_cart', compact('title', 'meta_desc', 'url_canonical'))
                    ->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function deleteCart($rowId)
    {
        Cart::update($rowId, 0);

        return redirect('show-cart');
    }

    public function updateCartQty(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;

        Cart::update($rowId, $qty);
        return redirect('show-cart');
    }

    //ajax
    public function addCartAjax(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if($cart == true){
            $isAvaiable = 0; //Kiem tra san pham da co trong cart chua
            foreach ($cart as $key => $value) {
                if($value['product_id'] == $data['cart_product_id']){
                    $isAvaiable++;
                }
            }
            if($isAvaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price']
                );
                Session::put('cart', $cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price']
            );
        }

        Session::put('cart', $cart);
        Session::save();
    }

    public function showCartAjax(Request $request)
    {
        $title = 'Giỏ hàng';
        $meta_desc = "Giỏ hàng";
        $url_canonical = $request->url();

        $cate_product = DB::table('category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        return view('pages.cart.show_cart_ajax', compact('title', 'meta_desc', 'url_canonical'))
                    ->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function deleteCartProduct($session_id)
    {
        $cart = Session::get('cart');
        if($cart == true){
            foreach ($cart as $key => $value) {
                if($value['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect('show-cart-ajax')->with('message', 'Xóa thành công!');
        }
        return redirect('show-cart-ajax')->with('message', 'Xóa thất bại!');
    }

    public function updateCart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $value) {
                    if($value['session_id'] == $key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect('show-cart-ajax')->with('message', 'Cập nhật giỏ hàng thành công!');
        }else{
        return redirect('show-cart-ajax')->with('message', 'Cập nhật giỏ hàng thất bại!');

        }
    }

    public function deleteAllCartProduct()
    {
        $cart = Session::get('cart');
        if($cart == true){
            // Session::destroy();
            Session::forget('cart');
            Session::forget('coupon');
            return redirect('show-cart-ajax')->with('message', 'Xóa thành công!');
            
        }
    }

    //coupon
    public function checkCoupon(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon'])->first();
        
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_avaiable = 0;
                    if($is_avaiable == 0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number
                        );
                        Session::put('coupon', $cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return redirect('show-cart-ajax')->with('message', 'Thêm mã giảm giá thành công!');
            }
        }else{
            return redirect('show-cart-ajax')->with('message', 'Thêm mã giảm giá thất bại!');
        }
    }

}
