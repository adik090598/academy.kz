<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;

    public const IMAGE_DIRECTORY = "images/quizzes";
    public const DOCUMENT_DIRECTORY = "documents/quizzes";
    public const CERTIFICATE_DIRECTORY = "images/certificates";

    protected $fillable = ['name', 'description', 'duration', 'price',
        'subject_id', 'image_path', 'category_id', 'start_date', 'end_date',
        'first_place', 'second_place', 'third_place', 'role_id',
        'first_place_certificate', 'second_place_certificate', 'third_place_certificate', 'default_certificate'];

    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id', 'id');
    }

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function documents() {
        return $this->hasMany(QuizDocument::class, 'quiz_id', 'id');
    }

}
