<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use App\Models\AttributeValue;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    protected $fillable = [ 'name', 'is_active'];

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
