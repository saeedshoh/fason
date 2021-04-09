<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class StoreEdit extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'store_id',
        'description',
        'address',
        'avatar',
        'cover',
        'city_id',
        'is_active',
        'is_moderation',
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    
    public function product() {
        return $this->hasMany('App\Models\Product');
    }
    
    public function orders() {
        return $this->hasManyThrough(
            'App\Models\Order',
            'App\Models\Product',
            'store_id',
            'product_id',
            'id',
            'id'
        );
    }
    
    public function categories() {
        return $this->hasManyThrough(
            'App\Models\Category',
            'App\Models\Product',
            'id',
            'id',
        );
    }
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

     /**
     * The monetizations that belong to the store.
     */
    public function monetizations()
    {
        return $this->belongsToMany(Monetization::class);
    }

}
