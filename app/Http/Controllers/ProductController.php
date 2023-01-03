<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function add()
    {
        $title = 'Thêm sản phẩm';

        $cate_product = DB::table('category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->orderby('brand_id', 'desc')->get();
        
        return view('admin.add_product', compact('title'))->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }

    public function all()
    {
        $title = 'Danh sách sản phẩm';
        $all_product = DB::table('product')->get();
        $manager_product = view('admin.all_product', compact('title'))
                                    ->with('all_product', $all_product);
        
        return view('adminLayout')->with('admin.all_product', $manager_product);
    }

    public function save(Request $request)
    {
        $title = 'Add Category';

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image){
            //lay ten file upload
            $get_name_image = $get_image->getClientOriginalName();
            //current: lấy tên đầu tiên; explode: phân tách chuỗi tại dấu ''
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('product')->insert($data);
            Session::put('message', 'Thêm thành công!');

            return redirect('add-product');
        }

        $data['product_image'] = '';
        DB::table('product')->insert($data);
        Session::put('message', 'Thêm thành công!');

        return redirect('add-product');
    }

    public function unactive_product($product_id)
    {
        DB::table('product')->where('product_id', $product_id)->update(['product_status'=>0]);
        return redirect('all-product');
    }

    public function active_product($product_id)
    {
        DB::table('product')->where('product_id', $product_id)->update(['product_status'=>1]);
        return redirect('all-product');
    }

    public function edit($product_id)
    {
        $title = 'Sửa sản phẩm';
        $edit_product = DB::table('product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product', compact('title'))
                                    ->with('edit_product', $edit_product);
        
        return view('adminLayout')->with('admin.edit_product', $manager_product);
    }

    public function update(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;

        DB::table('product')->where('product_id', $product_id)->update($data);
        return redirect('all-product');
    }

    public function delete($product_id)
    {
        DB::table('product')->where('product_id', $product_id)->delete();
        return redirect('all-product');
    }
}
