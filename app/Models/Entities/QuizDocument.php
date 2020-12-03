<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class QuizDocument extends Model
{
    protected $fillable = ['quiz_id', 'path'];
}
