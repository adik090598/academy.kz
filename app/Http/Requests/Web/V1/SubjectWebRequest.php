<?php


namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class SubjectWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:subjects,id', !$this->isStore() ? 'required' : ''],
            'name' => [!$this->isDelete() ? 'required' : '', 'string']
        ];
    }


}
