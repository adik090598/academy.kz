<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Subject;

class QuizWebForm implements WithForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];
        if($value) {
            $array = FormUtil::input('id', 1, null,
                'numeric', true,
                $value->id, null, null, true);
        }
        $subjects = Subject::all();
        $selected = false;
        $subject_selects = [];
        foreach ($subjects as $subject) {
            $subject_selects[] = ['value' => $subject->id, 'title' => $subject->name,
                'selected' => $value ? $value->subject_id == $subject->id ? 'selected' : '' : ''];
        }
        return array_merge(
            $array,
            FormUtil::input('name', 'Тест по физике', 'Название',
                'text', false, $value ? $value->name : ''),
            FormUtil::input('image', '', 'Фото',
                'file', !$value ? true : false),
            FormUtil::input('description', 'Описание для теста', 'Описание',
                'text', false, $value ? $value->description : ''),
            FormUtil::input('duration', 'Время в минутах', 'Продолжительность теста',
                'number', false, $value ? $value->duration : ''),
            FormUtil::select('subject_id', 'Физика', 'Предмет',
                'text', $subject_selects),
            FormUtil::input('price', '1800', 'Стоимость',
                'text', false, $value ? $value->price : ''),
        );
    }
}
