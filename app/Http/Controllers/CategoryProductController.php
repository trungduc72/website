<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProductController extends Controller
{
    public function add()
    {
        return view('admin.add_category_product');
    }

    public function all()
    {
        $all_category_product = DB::table('category_product')->get();
        $manager_category_product = view('admin.all_category_product')
                                    ->with('all_category_product', $all_category_product);

        return view('adminLayout')->with('admin.all_category_product', $manager_category_product);
    }

    public function save(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        DB::table('category_product')->insert($data);
        Session::put('message', 'Thêm thành công!');

        return redirect('add-category-product');
    }
}
