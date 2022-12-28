<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('adminLogin');
    }

    public function showDashboard()
    {
        return view('admin.dashboard');
    }
}
