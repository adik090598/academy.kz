<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class AreaWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:areas,id', !$this->isStore() ? 'required' : ''],
            'name' => [!$this->isDelete() ? 'required' : '', 'string'],
            'city_id' => ['numeric', 'exists:cities,id', 'required'],
        ];
    }
}
