<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;

class DeliveryController extends Controller
{
    public function delivery(Request $request){
        $title = "Quản lí vận chuyển";

        $city = City::orderby('matp', 'ASC')->get();
        return view('admin.delivery.add_delivery', compact('title', 'city'));
    }

    public function selectDelivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == "city"){
                $select_province = Province::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>---Chọn quận huyện---</option>';
                foreach($select_province as $key => $province){
                    $output .= '<option value="'.$province->maqh.'">'.$province->name_qh.'</option>';

                }
            }else{
                $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>---Chọn xã phường---</option>';
                foreach($select_wards as $key => $wards){
                    $output .= '<option value="'.$wards->xaid.'">'.$wards->name_xa.'</option>';

                }
            }
        }
        echo $output;
    }

    public function insertDelivery(Request $request){
        $data = $request->all();

        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];

        $fee_ship->save();

    }

    public function selectFeeship(){
        $feeship = Feeship::orderby('fee_id', 'DESC')->get();
        $output = '';
        $output .= '
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Tên thành phố
                                </th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Tên quận huyện</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Tên xã phường</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Phí ship</th>
                            </tr>
                        </thead>
                        <tbody>';
        
        foreach ($feeship as $key => $fee){
            $output .= '
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">'. $fee->city->name_tp .'</h6>
                                            <p class="text-xs text-secondary mb-0"></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">'. $fee->province->name_qh .'</h6>
                                            <p class="text-xs text-secondary mb-0"></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">'. $fee->wards->name_xa .'</h6>
                                            <p class="text-xs text-secondary mb-0"></p>
                                        </div>
                                    </div>
                                </td>
                                <td contenteditable data-feeship_id = "'.$fee->fee_id.'" class = "fee_feeship_edit">
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-xs">'. number_format($fee->fee_feeship) .'</h6>
                                            <p class="text-xs text-secondary mb-0"></p>
                                        </div>
                                    </div>
                                </td>
                            </tr>';
        }

        $output .= '
                        </tbody>
                    </table>
                </div>
            </div>';

        echo $output;
    }

    public function updateDelivery(Request $request){
        $data = $request->all();

        $fee_ship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value']);
        $fee_ship->fee_feeship = $fee_value;

        $fee_ship->save();
    }
}
