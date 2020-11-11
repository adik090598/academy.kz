<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'quiz_id', 'id');
    }

}

