<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'address',
        'total',
        'quantity',
        'order_status_id',
    ];


    public function product() {
        return $this->belongsTo('App\Models\Product');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function order_status() {
        return $this->belongsTo('App\Models\OrderStatus');
    }

    public function store() {
        return $this->belongsTo('App\Models\Store');
    }
}
