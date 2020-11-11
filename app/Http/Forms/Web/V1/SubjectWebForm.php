<?php


namespace App\Http\Forms\Web\V1;


use App\Http\Forms\Web\FormUtil;

class SubjectWebForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];
        if($value) {
            $array = FormUtil::input('id', 1, null,
                'numeric', true,
                $value->id, null, null, true);
        }
        return array_merge(
            $array,
            FormUtil::input('name', 'Физика', 'Название',
                'text', false, $value ? $value->name : '')
        );
    }
}
