<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $fillable = ['answer', 'question_id', 'is_right'];

    public function question()
    {
        return $this->belongsTo('App\Models\Entities\Question');
    }
}
