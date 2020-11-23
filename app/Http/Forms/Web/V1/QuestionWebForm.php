<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class QuestionWebForm implements WithForm
{

    public static function inputGroups($value = null): array
    {
        $array = [];
        if($value) {
            $array = FormUtil::textArea('name', 'Вопрос', 'Вопрос',
                true,  $value->question_text ? $value : '');
        }
        return array_merge(
            $array,
            FormUtil::textArea('name', 'Вопрос', 'Вопрос',
                true,  $value ? $value->name : '')
        );
    }
}
