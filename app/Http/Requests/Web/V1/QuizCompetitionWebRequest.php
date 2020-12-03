<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class QuizCompetitionWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'documents' => ['array', !$this->isEditOrUpdate() ? 'required' : ''],
            'image' => [!$this->isEditOrUpdate() ? 'required' : '', 'image'],
            'id' => ['numeric', 'exists:quizzes,id', !$this->isStore() ? 'required' : ''],
        ];
    }
}
