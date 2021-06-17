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
        'order_number',
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

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    public function no_scope_store()
    {
        return $this->store()->withoutGlobalScopes();
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($store) {
            $store->update(['order_number' => $store->id]);
        });
    }
}
