<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'status'
    ];

    public function products() {
        return $this->hasMany('App\Models\Product', 'id', 'product_id');
    }

}
