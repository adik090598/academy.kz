<?php


namespace App\Http\Requests\Web\V1;


use App\Http\Requests\Web\WebBaseRequest;

class QuestionDeleteWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:questions,id']
        ];
    }
}
