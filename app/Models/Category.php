<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasSlug;
    use HasFactory;

    protected $fillable = [ 'name', 'icon', 'is_active', 'parent_id'];

    public function parent()   {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
    public function childrens(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function attributes()
    {
        return $this->belongsToMany('App\Models\Attribute', 'category_attributes');
    }

    public function grandchildren() {
        return $this->childrens()->with('childrens');
    }
    public function products() {
        return $this->hasMany('App\Models\Product');
    }
    public function getSlugOptions() : SlugOptions   {
        return SlugOptions::create()
        ->generateSlugsFrom('name')
        ->saveSlugsTo('slug');
    }

}
