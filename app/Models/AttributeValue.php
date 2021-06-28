<?php

namespace App\Models;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'value', 'attribute_id'];

    /**
     * Get the attribute for the attribute values.
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attributes', 'attribute_value_id', 'product_id');
    }
}
