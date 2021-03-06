<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class QuizEditWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:quizzes,id', !$this->isStore() ? 'required' : '']
        ];
    }
}
