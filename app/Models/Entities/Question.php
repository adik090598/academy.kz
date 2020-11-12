<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question_text', 'quiz_id'];

    public function quiz()
    {
        return $this->belongsTo('App\Models\Entities\Quiz','quiz_id','id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id','id');
    }
}


