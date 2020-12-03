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
            'start_date' => ['date', 'nullable'],
            'end_date' => ['date', 'nullable'],
            'first_place' => ['numeric', 'nullable'],
            'second_place' => ['numeric', 'nullable'],
            'third_place' => ['numeric', 'nullable'],
            'duration' => ['required', 'numeric', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'role_id' => ['required', 'exists:roles,id'],
            'image' => [!$this->isEditOrUpdate() ? 'required' : '', 'image'],
            'id' => ['numeric', 'exists:quizzes,id', !$this->isStore() ? 'required' : '']
        ];
    }

}
