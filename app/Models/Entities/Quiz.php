<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;

    public const IMAGE_DIRECTORY = "images/quizzes";

    protected $fillable = ['name', 'description', 'duration', 'price', 'subject_id', 'image_path'];

    public function questions()
    {
        return $this->hasMany('App\Models\Entities\Question');
    }

}
