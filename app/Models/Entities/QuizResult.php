<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizResult extends Model
{
    use SoftDeletes;

    public const FIRST_PLACE = 1;
    public const SECOND_PLACE = 2;
    public const THIRD_PLACE = 3;
    public const DEFAULT = 4;

    protected $fillable = ['user_id', 'quiz_id', 'order_id', 'result'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class,'quiz_id','id');
    }

    public function answers() {
        return $this->hasMany(QuizResultAnswer::class, 'quiz_result_id', 'id')->withTrashed();
    }

    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
