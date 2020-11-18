<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

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


