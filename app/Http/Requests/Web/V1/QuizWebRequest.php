<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class QuizWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'name' => [!$this->isDelete() ? 'required' : '', 'string'],
            'id' => ['numeric', 'exists:quizzes,id', !$this->isStore() ? 'required' : '']
        ];
    }

}
