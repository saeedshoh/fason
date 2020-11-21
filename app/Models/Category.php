<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'icon', 'is_active', 'parent_id' ];

    public function parent() 
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function subcategories(){
        return $this->hasMany(Category::class,'parent_id', 'id')->with('subcategories');
    }

    public function getSlugOption() : SlugOptions
    {
        return SlugOptions::create()
        ->generateSlugsFrom('name')
        ->saveSlugsTo('slug');
    }
}
