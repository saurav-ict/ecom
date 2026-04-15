<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyOption extends Model
{
    protected $fillable = ['property_id', 'name', 'is_active'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
