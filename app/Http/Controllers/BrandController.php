<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandController extends Controller
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
        $title = 'Thêm thương hiệu sản phẩm';
        return view('admin.add_brand', compact('title'));
    }

    public function all()
    {
        $this->AuthLogin();
        $title = 'Thương hiệu sản phẩm';
        $all_brand = DB::table('brand')->get();
        $manager_brand = view('admin.all_brand', compact('title'))
                                    ->with('all_brand', $all_brand);
        
        return view('adminLayout')->with('admin.all_brand', $manager_brand);
    }

    public function save(Request $request)
    {
        $this->AuthLogin();
        
        $validate = $request->validate([
            'brand_name' => 'required',
            'brand_desc' => 'required'
        ], [
            'brand_name.required' => 'Vui lòng nhập tên thương hiệu!',
            'brand_desc.required' => 'Vui lòng nhập mô tả thương hiệu!'
        ]);

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        $data['brand_status'] = $request->brand_status;

        DB::table('brand')->insert($data);
        Session::put('message', 'Thêm thành công!');

        return redirect('add-brand');
    }

    public function unactive_brand($brand_id)
    {
        $this->AuthLogin();
        DB::table('brand')->where('brand_id', $brand_id)->update(['brand_status'=>0]);
        return redirect('all-brand');
    }

    public function active_brand($brand_id)
    {
        $this->AuthLogin();
        DB::table('brand')->where('brand_id', $brand_id)->update(['brand_status'=>1]);
        return redirect('all-brand');
    }

    public function edit($brand_id)
    {
        $this->AuthLogin();
        $title = 'Sửa thương hiệu sản phẩm';
        $edit_brand = DB::table('brand')->where('brand_id', $brand_id)->get();
        $manager_brand = view('admin.edit_brand', compact('title'))
                                    ->with('edit_brand', $edit_brand);
        
        return view('adminLayout')->with('admin.edit_brand', $manager_brand);
    }

    public function update(Request $request, $brand_id)
    {
        $this->AuthLogin();

        $validate = $request->validate([
            'brand_name' => 'required',
            'brand_desc' => 'required'
        ], [
            'brand_name.required' => 'Vui lòng nhập tên thương hiệu!',
            'brand_desc.required' => 'Vui lòng nhập mô tả thương hiệu!'
        ]);

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;

        DB::table('brand')->where('brand_id', $brand_id)->update($data);
        return redirect('all-brand');
    }

    public function delete($brand_id)
    {
        $this->AuthLogin();
        DB::table('brand')->where('brand_id', $brand_id)->delete();
        return redirect('all-brand');
    }
    //Admin

    //
    public function show_brand_home($brand_id, Request $request)
    {
        $title = "Thương hiệu sản phẩm";

        $cate_product = DB::table('category_product')->where('category_status', '1')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '1')->orderby('brand_id', 'desc')->get();
        $brand_by_id = DB::table('product')->join('brand', 'product.brand_id', '=', 'brand.brand_id')
                                                ->where('product.brand_id',$brand_id )->get();

        foreach ($brand_by_id as $value) {
            //seo
            $meta_desc = $value->brand_desc;
            $meta_keywords = $value->brand_name;
            $url_canonical = $request->url();
        }
        
        $brand_name = DB::table('brand')->where('brand.brand_id', $brand_id)->limit(1)->get();

        return view('pages.brand.home_brand', compact('title', 'meta_desc', 'url_canonical', 'meta_keywords'))->with('brand_by_id', $brand_by_id)
                ->with('category', $cate_product)->with('brand', $brand_product)->with('brand_name', $brand_name);
    }
}
