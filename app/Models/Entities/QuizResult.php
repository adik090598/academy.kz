<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizResult extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'quiz_id', 'order_id', 'result'];

    public function quiz()
    {
        return $this->belongsTo('App\Models\Entities\Quiz','quiz_id','id');
    }
}
