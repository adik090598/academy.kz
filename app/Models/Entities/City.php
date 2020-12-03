<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'region_id'];

    public function region() {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function areas() {
        return $this->hasMany(Area::class, 'area_id', 'id');
    }

}
