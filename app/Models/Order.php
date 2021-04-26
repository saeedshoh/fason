<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'address',
        'total',
        'margin',
        'quantity',
        'comment',
        'order_status_id',
        'attributes'
    ];

    protected $casts = [
        'attributes' => 'array'
    ];

    public function product() {
        return $this->belongsTo('App\Models\Product')->withTrashed();
    }

    public function no_scope_product()
    {
        return $this->product()->withoutGlobalScopes();
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function order_status() {
        return $this->belongsTo('App\Models\OrderStatus');
    }

    public function store() {
        return $this->belongsTo('App\Models\Store')->withoutGlobalScopes();
    }
}
