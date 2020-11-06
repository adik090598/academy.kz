<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Subject;

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

        return array_merge(
            $array,
            FormUtil::input('name', 'Тест по физике', 'Название',
                'text', false, $value ? $value->name : ''),
            FormUtil::input('image', '', 'Фото',
                'file', !$value ? true : false),
            FormUtil::input('description', 'Описание для теста', 'Описание',
                'text', false, $value ? $value->description : ''),
            FormUtil::input('duration', 'Время в минутах', 'Продолжительность теста',
                'text', false, $value ? $value->description : ''),
            FormUtil::select('subject', 'Физика', 'Предмет',
                'text',[
                    FormUtil::option('1',false, 'Физика'),
                    FormUtil::option('2',false, 'Математика'),
                    FormUtil::option('3',false, 'Геометрия'),
                    FormUtil::option('4',false, 'Всемирная история'),
                    FormUtil::option('5',false, 'История Казахстана'),
                    FormUtil::option('6',false, 'География'),
                    FormUtil::option('7',false, 'Химия'),
                    FormUtil::option('8',false, 'Биология')
                ],$value ? $value->subject : '', ),
            FormUtil::input('price', '1800', 'Стоимость',
                'text', false, $value ? $value->price : ''),
        );
    }
}
