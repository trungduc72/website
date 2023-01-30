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
    public function index(Request $request){
        $title = 'Trang chủ';

        //seo
        $meta_desc = "Trà Thái Nguyên Thượng Hạng";
        $meta_keywords = "Trà Thái Nguyên Thượng Hạng";
        $url_canonical = $request->url();

        $cate_product = DB::table('category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();

        // $all_product = DB::table('product')
        //                 ->join('category_product', 'category_product.category_id','=','product.category_id')
        //                 ->join('brand', 'brand.brand_id','=','product.brand_id')
        //                 ->orderby('product.product_id', 'desc')->get();
        
        $all_product = DB::table('product')->where('product_status', '1')->orderby('product_id', 'desc')->limit(3)->get();

        return view('pages.home', compact('title', 'url_canonical', 'meta_desc', 'meta_keywords'))
                ->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product);
    }

    public function search(Request $request)
    {
        $title = 'Tìm kiếm sản phẩm';

        $keyword = $request->keyword;

        $cate_product = DB::table('category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
      
        // $all_product = DB::table('product')
        //                 ->join('category_product', 'category_product.category_id','=','product.category_id')
        //                 ->join('brand', 'brand.brand_id','=','product.brand_id')
        //                 ->orderby('product.product_id', 'desc')->get();
        
        $search_product = DB::table('product')->where('product_name', 'like', '%' .$keyword. '%')->get();

        return view('pages.product.search', compact('title'))
                ->with('category', $cate_product)->with('brand', $brand_product)->with('search_product', $search_product);
 
    }
}
