<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;

class CartController extends Controller
{
    public function saveCart(Request $request)
    {
        $title = 'Giỏ hàng';

        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('product')->where('product_id', $productId)->first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        Cart::setGlobalTax(10);

        return redirect('show-cart');
    }

    public function showCart()
    {
        $title = 'Giỏ hàng';

        $cate_product = DB::table('category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        return view('pages.cart.show_cart', compact('title'))
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

}
