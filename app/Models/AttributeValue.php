<?php

namespace App\Models;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name', 
        'value',
        'attribute_id',
    ];

    /**
     * Get the attribute of the attribute value.
     */
    public function attribute()
    {
		return $this->belongsTo(Attribute::class);
    }
}
