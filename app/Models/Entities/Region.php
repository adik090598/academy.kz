<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['name'];

    public function cities() {
        return $this->hasMany(City::class, 'city_id', 'id');
    }
}
