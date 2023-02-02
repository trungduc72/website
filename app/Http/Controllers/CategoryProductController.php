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
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('admin.dashboard');
        }
        else return redirect('admin-login')->send();
    }

    //Admin
    public function add()
    {
        $this->AuthLogin();
        $title = 'Thêm danh mục sản phẩm';
        session()->put('title','Danh muc san pham');
        return view('admin.add_category_product', compact('title'));
    }

    public function all()
    {
        $this->AuthLogin();
        $title = 'Danh mục sản phẩm';
        $all_category_product = DB::table('category_product')->get();
        $manager_category_product = view('admin.all_category_product', compact('title'))
                                    ->with('all_category_product', $all_category_product);
        
        return view('adminLayout')->with('admin.all_category_product', $manager_category_product);
    }

    public function save(Request $request)
    {
        $this->AuthLogin();

        $validate = $request->validate([
            'category_product_name' => 'required',
            'category_product_desc' => 'required'
        ], [
            'category_product_name.required' => 'Vui lòng nhập tên danh mục!',
            'category_product_desc.required' => 'Vui lòng nhập mô tả danh mục!'
        ]);

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        DB::table('category_product')->insert($data);
        Session::put('message', 'Thêm thành công!');

        return redirect('add-category-product');
    }

    public function unactive_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('category_product')->where('category_id', $category_product_id)->update(['category_status'=>0]);
        return redirect('all-category-product');
    }

    public function active_category_product($category_product_id)
    {
        $this->AuthLogin();
        DB::table('category_product')->where('category_id', $category_product_id)->update(['category_status'=>1]);
        return redirect('all-category-product');
    }

    public function edit($category_product_id)
    {
        $this->AuthLogin();
        $title = 'Sửa danh mục sản phẩm';
        $edit_category_product = DB::table('category_product')->where('category_id', $category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product', compact('title'))
                                    ->with('edit_category_product', $edit_category_product);
        
        return view('adminLayout')->with('admin.edit_category_product', $manager_category_product);
    }

    public function update(Request $request, $category_product_id)
    {
        $this->AuthLogin();

        $validate = $request->validate([
            'category_product_name' => 'required'
        ], [
            'category_product_name.required' => 'Vui lòng nhập tên danh mục!'
        ]);

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;

        DB::table('category_product')->where('category_id', $category_product_id)->update($data);
        return redirect('all-category-product');
    }

    public function delete($category_product_id)
    {
        $this->AuthLogin();
        DB::table('category_product')->where('category_id', $category_product_id)->delete();
        return redirect('all-category-product');
    }
    //Admin

    //
    public function show_category_home($category_id, Request $request)
    {
        $title = "Danh mục sản phẩm";

        $cate_product = DB::table('category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $category_by_id = DB::table('product')->join('category_product', 'product.category_id', '=', 'category_product.category_id')
                                                ->where('product.category_id',$category_id )->get();
        
        $meta_desc = '';
        $meta_keywords = '';
        $url_canonical = $request->url();                    
        foreach ($category_by_id as $value) {
            //seo
            $meta_desc = $value->category_desc;
            $meta_keywords = $value->category_name;
            $url_canonical = $request->url();
        }
       
        $category_name = DB::table('category_product')->where('category_product.category_id', $category_id)->limit(1)->get();

        return view('pages.category.home_category', compact('title', 'meta_desc', 'url_canonical', 'meta_keywords'))->with('category_by_id', $category_by_id)
                ->with('category', $cate_product)->with('brand', $brand_product)->with('category_name', $category_name);
    }

}
