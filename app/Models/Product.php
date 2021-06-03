<?php

namespace App\Models;

use App\Models\Store;
use Spatie\Sluggable\HasSlug;
use App\Scopes\FreshProductScope;
use Spatie\Sluggable\SlugOptions;
use App\Http\Traits\FilterableTrait;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\StoreActiveProductsScope;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasSlug, SoftDeletes, HasFactory, FilterableTrait;

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
        return $this->belongsTo('App\Models\Store')->withoutGlobalScopes();
    }

    public function no_scope_store()
    {
        return $this->store()->withoutGlobalScopes();
    }

    public function product_status()
    {
        return $this->belongsTo('App\Models\ProductStatus');
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
        $store = Store::withoutGlobalScopes()->find($this->store_id);
        $category = Category::withoutGlobalScopes()->find($this->category_id);

        $common_monetization = 0;
        $category_monetization = 0;
        $store_monetization = 0;

        if ($category->is_monetized) {
            foreach ($category->monetizations as $monetization) {
                if ($this->price >= $monetization->min && $this->price < $monetization->max) {
                    $category_monetization = $this->price * ($monetization->margin / 100) + $monetization->added_val;
                }
            }
        }

        if ($store->is_monetized) {
            if ($store->monetizations->first()) {
                foreach ($store->monetizations as $monetization) {
                    if ($this->price >= $monetization->min && $this->price < $monetization->max) {
                        $store_monetization = $this->price * ($monetization->margin / 100) + $monetization->added_val;
                    }
                }
            }
        }

        $monetizations = Monetization::doesntHave('stores')->doesntHave('categories')->get();
        if ($monetizations->isNotEmpty()) {
            foreach ($monetizations as $monetization) {
                if ($this->price >= $monetization->min && $this->price < $monetization->max) {
                    $common_monetization = $this->price * ($monetization->margin / 100) + $monetization->added_val;
                }
            }
        }

        return $this->price + $common_monetization + $store_monetization + $category_monetization;
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new FreshProductScope);
        static::addGlobalScope(new StoreActiveProductsScope);
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function scopeFull($query, $request)
    {
        $query->where('name', 'like', '%' . $request->search . '%')
            ->orWhereHas('store', function ($store) use ($request) {
                $store->where('name',  'like', '%' . $request->search . '%');
            })
            ->orWhereHas('category', function ($category) use ($request) {
                $category->where('name',  'like', '%' . $request->search . '%');
            })
            ->latest('updated_at');
    }

    public function scopeAccepted($query, $request = null)
    {
        $query->where('product_status_id', 2)
            ->whereNull('deleted_at')
            ->where('quantity', '>', 1)
            ->misc($request);
    }

    function scopeNotInStock($query, $request = null)
    {
        $query->where('product_status_id', 5)
            ->whereNull('deleted_at')
            ->where('quantity', 0)
            ->misc($request);
    }

    public function scopeCanceled($query, $request = null)
    {
        $query->where('product_status_id', 3)
            ->whereNull('deleted_at')
            ->misc($request);
    }

    public function scopeHidden($query, $request = null)
    {
        $query->where('product_status_id', 4)
            ->whereNull('deleted_at')
            ->misc($request);
    }

    public function scopeOnCheck($query, $request = null)
    {
        $query->where('product_status_id', 1)
            ->whereNull('deleted_at')
            ->misc($request);
    }

    public function scopeDeleted($query, $request = null)
    {
        $query->whereNotNull('deleted_at')
            ->misc($request);
    }

    public function scopeMisc($query, $request = null)
    {
        $query->when($request, function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhereHas('store', function ($store) use ($request) {
                    $store->where('name',  'like', '%' . $request->search . '%');
                })
                ->orWhereHas('category', function ($category) use ($request) {
                    $category->where('name',  'like', '%' . $request->search . '%');
                });
        })
            ->latest('updated_at');
    }
}
