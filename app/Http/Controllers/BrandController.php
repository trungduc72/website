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
        $title = 'Add Category';

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
}
