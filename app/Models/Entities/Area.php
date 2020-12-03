<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name', 'city_id'];

    public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function schools() {
        return $this->hasMany(School::class, 'school_id', 'id');
    }

}
