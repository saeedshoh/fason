<?php

namespace App\Models;

use App\Scopes\ActiveStoreScope;
use App\Models\Monetization;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, HasSlug, SoftDeletes;

    protected $fillable = [
        'order_number',
        'name',
        'description',
        'address',
        'avatar',
        'cover',
        'user_id',
        'city_id',
        'is_active',
        'is_monetized',
        'is_moderation',
        'starred_at',
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
        )->withoutGlobalScopes();
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

    public function scopeStarred()
    {
        return $this->whereNotNull('starred_at');
    }

    /**
     * Get the store edit associated with the store.
     */
    public function store_edit()
    {
        return $this->hasOne(StoreEdit::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new ActiveStoreScope);
        static::created(function ($store) {
            $store->update(['order_number' => $store->id]);
        });
    }
}
