<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Monetization extends Model
{
    use HasFactory;

    protected $fillable = [
        'min',
        'max',
        'margin',
        'added_val',
    ];

    /**
     * The stores that belong to the monetization.
     */
    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }

    /**
     * The categories that belong to the monetization.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
