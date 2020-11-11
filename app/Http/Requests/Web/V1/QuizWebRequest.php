<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class QuizWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'duration' => ['required', 'numeric', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => [!$this->isEditOrUpdate() ? 'required' : '', 'image'],
            'id' => ['numeric', 'exists:quizzes,id', !$this->isStore() ? 'required' : '']
        ];
    }

}
