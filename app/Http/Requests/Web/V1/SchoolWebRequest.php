<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class SchoolWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:schools,id', !$this->isStore() ? 'required' : ''],
            'name' => [!$this->isDelete() ? 'required' : '', 'string'],
            'area_id' => ['numeric', 'exists:areas,id', 'required'],
        ];
    }
}
