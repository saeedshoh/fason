<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use App\Models\AttributeValue;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasSlug;

    protected $fillable = [ 'name', 'is_active'];


    public function child()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function getSlugOptions(): SlugOptions
    {

        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the attribute values for the attribute.
     */
    public function attribute_values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
