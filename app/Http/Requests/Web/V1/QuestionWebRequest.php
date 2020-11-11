<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

use Illuminate\Foundation\Http\FormRequest;

class QuestionWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'quiz_id' => ['required', 'exists:quizzes,id'],
            'name' => ['required', 'string'],
            'answers' => ['required', 'array'],
            'answers.*.check' => ['required', 'boolean'],
            'answers.*.text' => ['required', 'string'],
            'id' => ['numeric', 'exists:questions,id', !$this->isStore() ? 'required' : '']
        ];
    }
}
