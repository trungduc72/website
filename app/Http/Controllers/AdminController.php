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
    public function index()
    {
        return view('adminLogin');
    }

    public function showDashboard()
    {
        $title = 'Dashboard';
        return view('admin.dashboard', compact('title'));
    }

    public function login(Request $request)
    {
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
            return redirect('login');
        }
    }

    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        
        return redirect('login');
    }
}
