<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegionWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:regions,id', !$this->isStore() ? 'required' : ''],
            'name' => [!$this->isDelete() ? 'required' : '', 'string']
        ];
    }
}
