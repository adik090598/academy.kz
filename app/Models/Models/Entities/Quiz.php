<?php

namespace App\Models\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const IMAGE_DIRECTORY = "images/quizzes";

    protected $fillable = ['name', 'image_path'];
}
