<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use App\Scopes\FreshProductScope;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasSlug;
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'category_id',
        'quantity',
        'price',
        'store_id',
        'product_status_id',
        'gallery',
    ];

    protected $casts = [
        'gallery' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function attriute()
    {
        return $this->belongsTo('App\Models\Attribute');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    public function product_status()
    {
        return $this->belongsTo('App\Models\ProductStatus');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function favorite()
    {
        return $this->hasMany('App\Models\Favorite', 'product_id');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getPriceAfterMarginAttribute()
    {
        $monetizations = Monetization::get();
        foreach($monetizations as $monetization) {
            if ($this->price >= $monetization->min && $this->price < $monetization->max) {
                return $this->price + $this->price*($monetization->margin/100);
            }
        }
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new FreshProductScope);
    }
}
