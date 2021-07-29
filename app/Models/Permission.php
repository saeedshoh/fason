<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];

    public function getTableAttribute()
    {
        $table = Str::of($this->name)->explode('-');
        return $table[1];
    }
}
