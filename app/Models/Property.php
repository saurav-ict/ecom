<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name', 'is_active'];

    public function options()
    {
        return $this->hasMany(PropertyOption::class);
    }
}
