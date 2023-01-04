<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        $title = 'Trang chủ';

        $cate_product = DB::table('category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        // $all_product = DB::table('product')
        //                 ->join('category_product', 'category_product.category_id','=','product.category_id')
        //                 ->join('brand', 'brand.brand_id','=','product.brand_id')
        //                 ->orderby('product.product_id', 'desc')->get();
        
        $all_product = DB::table('product')->where('product_status', '1')->orderby('product_id', 'desc')->limit(3)->get();

        return view('pages.home', compact('title'))
                ->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product);
    }
}
