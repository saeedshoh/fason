<?php

namespace App\Models;

use App\Models\Store;
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

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    public function no_scope_store()
    {
        return $this->store()->withoutGlobalScopes();
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

    public function attribute_variation()
    {
        return $this->hasMany('App\Models\ProductAttribute', 'product_id');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getPriceAfterMarginAttribute()
    {
        $store = Store::find($this->store_id);
        $category = Category::find($this->category_id);
        $price = 0;
        if($category->is_monetized) {
            foreach($category->monetizations as $monetization) {
                if ($this->price >= $monetization->min && $this->price < $monetization->max) {
                    $price = $this->price + $this->price*($monetization->margin/100) + $monetization->added_val;
                }
            }
        }
        if($store->is_monetized){
            foreach($store->monetizations as $monetization) {
                if ($this->price >= $monetization->min && $this->price < $monetization->max) {
                    return $this->price + $this->price*($monetization->margin/100) + $monetization->added_val + $price;
                }
                else{
                    $monetizations = Monetization::get();
                    foreach($monetizations as $monet) {
                        if ($this->price >= $monet->min && $this->price < $monet->max) {
                            return $this->price + ($this->price*($monet->margin/100)) + $monet->added_val + $price;
                        }
                    }
                    return $this->price;
                }
            }
        } else {
            $monetizations = Monetization::get();
            foreach($monetizations as $monetization) {
                if ($this->price >= $monetization->min && $this->price < $monetization->max) {
                    return $this->price + ($this->price*($monetization->margin/100)) + $monetization->added_val + $price;
                }
            }
            return $this->price;
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
