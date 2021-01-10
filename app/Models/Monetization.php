<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monetization extends Model
{
    use HasFactory;

    protected $fillable = [
        'min',
        'max',
        'margin',
        'is_active',
    ];
}
