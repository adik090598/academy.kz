<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class SubmitQuizWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'quiz_id' => ['required', 'exists:quizzes,id'],
            'answers' => ['required', 'string'],
        ];
    }

}
