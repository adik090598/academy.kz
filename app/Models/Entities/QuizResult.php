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
    public const DEFAULT_TEACHER = 5;

    protected $fillable = ['user_id', 'quiz_id', 'order_id',
        'result', 'all_score', 'name', 'surname', 'city', 'area', 'father_name',
        'region', 'city', 'school', 'class_teacher', 'class_number', 'class_letter', 'certificate_type'];

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
