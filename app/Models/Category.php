<?php

namespace App\Models;

use App\Models\Monetization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug, SoftDeletes, HasFactory;

    protected $fillable = ['name', 'icon', 'is_active', 'parent_id', 'is_monetized', 'order_no'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
    public function childrens()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function attributes()
    {
        return $this->belongsToMany('App\Models\Attribute', 'category_attributes');
    }

    public function grandchildren()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('childrens');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function products_no_scope()
    {
        return $this->hasMany('App\Models\Product')->withoutGlobalScopes();
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

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->order_no = $model->max('order_no') + 1;
        });
    }

    public function toggleIsActive($category, $is_active)
    {
        if(isset($category->childrens)){
            foreach ($category->childrens as $child) {
                $child->update([
                    'is_active' => $is_active
                ]);
                if(isset($child->grandchildren)){
                    foreach ($child->grandchildren as $grandchild) {
                        $grandchild->update([
                            'is_active' => $is_active
                        ]);
                    }
                }
            }
        }
    }

    public function isParent()
    {
        return $this->parent_id === 0 ? true : false;
    }
}
