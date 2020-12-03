<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    protected $fillable = ['answer', 'question_id', 'is_right'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id','id')->withTrashed();
    }
}
