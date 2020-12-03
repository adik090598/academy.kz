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
            $array = FormUtil::input('quiz_id', 1, null,
                'numeric', true,
                $value->id, null, null, true);
        }
        return array_merge(
            $array,
            FormUtil::textArea('name', 'Вопрос', 'Вопрос',
                true,  $value ? $value->question_text : '')
        );
    }
}
