<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'area_id'];

    public function area() {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

}
