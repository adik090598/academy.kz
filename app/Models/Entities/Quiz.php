<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;

    public const IMAGE_DIRECTORY = "images/quizzes";

    protected $fillable = ['name', 'description', 'duration', 'price',
        'subject_id', 'image_path', 'category_id', 'start_date', 'end_date',
        'first_place', 'second_place', 'third_place', 'role_id'];

    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id', 'id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

}
