<?php


namespace App\Http\Forms\Web\V1;


use App\Http\Forms\Web\FormUtil;

class QuizCompetitionWebForm
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
            FormUtil::input('name', 'Байкау', 'Название',
                'text', true, $value ? $value->name : ''),
            FormUtil::input('description', 'Описание для теста', 'Описание',
                'text', true, $value ? $value->description : ''),
            FormUtil::input('image', '', 'Фото',
                'file', !$value ? true : false),
            FormUtil::input('documents[]', '', 'Документы', 'file',
                !$value ? true : false, '',true, '', '', false)
        );
    }
}
