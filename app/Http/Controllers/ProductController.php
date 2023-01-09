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
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('admin.dashboard');
        }
        else return redirect('admin-login')->send();
    }

    public function add()
    {
        $this->AuthLogin();
        $title = 'Thêm sản phẩm';

        $cate_product = DB::table('category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->orderby('brand_id', 'desc')->get();
        
        return view('admin.add_product', compact('title'))->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }

    public function all()
    {
        $this->AuthLogin();
        $title = 'Danh sách sản phẩm';
        $all_product = DB::table('product')
                        ->join('category_product', 'category_product.category_id','=','product.category_id')
                        ->join('brand', 'brand.brand_id','=','product.brand_id')
                        ->orderby('product.product_id', 'desc')->get();
        $manager_product = view('admin.all_product', compact('title'))
                                    ->with('all_product', $all_product);
        
        return view('adminLayout')->with('admin.all_product', $manager_product);
    }

    public function save(Request $request)
    {
        $this->AuthLogin();
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
            $get_image->move('upload/product', $new_image);
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
        $this->AuthLogin();
        DB::table('product')->where('product_id', $product_id)->update(['product_status'=>0]);
        return redirect('all-product');
    }

    public function active_product($product_id)
    {
        $this->AuthLogin();
        DB::table('product')->where('product_id', $product_id)->update(['product_status'=>1]);
        return redirect('all-product');
    }

    public function edit($product_id)
    {
        $this->AuthLogin();
        $title = 'Sửa sản phẩm';

        $cate_product = DB::table('category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->orderby('brand_id', 'desc')->get();

        $edit_product = DB::table('product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product', compact('title'))
                                    ->with('edit_product', $edit_product)
                                    ->with('cate_product', $cate_product)
                                    ->with('brand_product', $brand_product);
        
        return view('adminLayout')->with('admin.edit_product', $manager_product);
    }

    public function update(Request $request, $product_id)
    {
        $this->AuthLogin();
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
            $get_image->move('upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật thành công!');

            return redirect('all-product');
        }

        $data['product_image'] = '';
        DB::table('product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật thành công!');

        return redirect('all-product');
    }

    public function delete($product_id)
    {
        $this->AuthLogin();
        DB::table('product')->where('product_id', $product_id)->delete();
        return redirect('all-product');
    }
    //Admin

    //
    public function detail($product_id)
    {
        $title = 'Chi tiết sản phẩm';

        $cate_product = DB::table('category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        
        $detail_product = DB::table('product')
                        ->join('category_product', 'category_product.category_id','=','product.category_id')
                        ->join('brand', 'brand.brand_id','=','product.brand_id')
                        ->where('product.product_id', $product_id)->get();

        foreach($detail_product as $item){
            $category_id = $item->category_id;
        }

        $related_product = DB::table('product')
                        ->join('category_product', 'category_product.category_id','=','product.category_id')
                        ->join('brand', 'brand.brand_id','=','product.brand_id')
                        ->where('category_product.category_id', $category_id)
                        ->whereNotIn('product.product_id', [$product_id])->get();

        return view('pages.product.show_detail', compact('title'))
                    ->with('category', $cate_product)->with('brand', $brand_product)
                    ->with('detail', $detail_product)->with('related', $related_product);
    }

}
