<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function add()
    {
        return view('admin.add_category_product');
    }

    public function all()
    {
        return view('admin.all_category_product');
    }
}
