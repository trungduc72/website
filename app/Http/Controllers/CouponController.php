<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CouponController extends Controller
{
    public function insertCoupon(){
        $title = "Thêm mã giảm giá";
        return view('admin.coupon.insert_coupon', compact('title'));
    }

    public function insertCouponCode(Request $request){
        $data = $request->all();

        $coupon = new Coupon();
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();

        Session::put('message', 'Thêm mã giảm giá thành công!');
        return redirect('insert-coupon');
    }

    public function listCoupon(){
        $title = "Danh sách mã giảm giá";

        $coupon = Coupon::orderby('coupon_id', 'DESC')->get();

        return view('admin.coupon.list_coupon', compact('title', 'coupon'));
    }

    public function deleteCoupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        return redirect('list-coupon');
    }

    public function unsetCoupon(){
        $coupon = Session::get('coupon');
        if($coupon == true){
            Session::forget('coupon');
            return redirect()->back()->with('message', 'Xóa mã khuyến mãi thành công!');
            
        }
    }
}
