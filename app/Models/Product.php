<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasSlug;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'slug',
        'image', 
        'description', 
        'category_id', 
        'quantity', 
        'price', 
        'color',
        'attribute_id',
        'store_id',
        'product_status_id',
        'brand_id',
        'varchar',
        'gallery',
    ];

    protected $casts = [
        'gallery' => 'array',
    ];

    public function getCategory() 
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getRalation() 
    {
        return $this->hasMany(Product::class);
    }

    public function getAttributes()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }

    public function getStore() 
    {
        return $this->belongsTo(store::class, 'store_id', 'id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getProductStatus() 
    {
        return $this->belongsTo(ProductStatus::class, 'product_status_id', 'id');
    }

    public function getBrand() 
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

}
