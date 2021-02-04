<?php

namespace App\Models;

use App\Models\Monetization;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'description',
        'address',
        'avatar',
        'cover',
        'user_id',
        'city_id',
        'is_active',
        'is_monetized',
    ];
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
