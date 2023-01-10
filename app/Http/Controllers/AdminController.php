<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('admin.dashboard');
        }
        else return redirect('admin-login')->send();
    }

    public function index()
    {
        return view('adminLogin');
    }

    public function showDashboard()
    {
        $this->AuthLogin();
        $title = 'Bảng điều khiển';
        return view('admin.dashboard', compact('title'));
    }

    public function login(Request $request)
    {
        $this->AuthLogin();

        $validate = $request->validate([
            'admin_email' => 'required',
            'admin_password' => 'required'
        ], [
            'admin_email.required' => 'Vui lòng nhập email của bạn!',
            'admin_password.required' => 'Vui lòng nhập mật khẩu của bạn!'
        ]);

        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('admin')
                    ->where('admin_email', $admin_email)
                    ->where('admin_password', $admin_password)
                    ->first();
        if($result){
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id); 
            return Redirect::to('/dashboard');
        }else {
            Session::put('message', 'Sai!');
            return redirect('admin-login');
        }
    }

    public function logout()
    {
        $this->AuthLogin();
        
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        
        return redirect('admin-login');
    }
}
