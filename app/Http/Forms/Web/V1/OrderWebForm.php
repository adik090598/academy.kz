<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Category;
use App\Models\Entities\Subject;

class OrderWebForm implements WithForm
{

    public static function inputGroups($value = null): array
    {
        $array = [];

        return array_merge(
            $array
        );
    }
}
