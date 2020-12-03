<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizResultAnswer extends Model
{
    use SoftDeletes;

    protected $fillable = ['quiz_result_id', 'answer_id', 'is_right'];

    public function answer() {
        return $this->belongsTo(Answer::class, 'answer_id', 'id');
    }
}
