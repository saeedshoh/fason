<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    public function attribute_value() {
        return $this->belongsTo('App\Models\AttributeValue');

    }
    public function attribute() {
        return $this->belongsTo('App\Models\Attribute');
    }
}

