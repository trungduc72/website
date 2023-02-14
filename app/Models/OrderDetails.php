<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'order_code', 'product_id', 'product_name', 'product_price', 'product_qty', 'product_coupon', 'product_fee'
    ];
    protected $primaryKey = 'order_detail_id';
    protected $table = 'order_detail';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
