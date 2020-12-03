<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Category;
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
        $subject_selects = [];
        foreach ($subjects as $subject) {
            $subject_selects[] = ['value' => $subject->id, 'title' => $subject->name,
                'selected' => $value ? $value->subject_id == $subject->id ? 'selected' : '' : ''];
        }

        $categories = Category::all();
        $category_selects = [];
        foreach ($categories as $category) {
            $category_selects[] = ['value' => $category->id, 'title' => $category->name,
                'selected' => $value ? $value->category_id == $category->id ? 'selected' : '' : ''];
        }
        $role_selectes = [];
        $role_selectes[] = ['value' => 2, 'title' => 'Ученик',
                'selected' => $value ? $value->role_id == 2 ? 'selected' : '' : ''];
        $role_selectes[] = ['value' => 3, 'title' => 'Преподователь',
            'selected' => $value ? $value->role_id == 3 ? 'selected' : '' : ''];
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
            FormUtil::select('subject_id', '', 'Предмет',
                true, $subject_selects),
            FormUtil::select('role_id', '', 'Роль',
                true, $role_selectes),
            FormUtil::select('category_id', '', 'Категория',
                true, $category_selects),
            FormUtil::input('price', '1800', 'Стоимость',
                'number', false, $value ? $value->price : ''),
            FormUtil::input('start_date', '', 'Дата начало',
                'date', false, $value ? $value->start_date : ''),
            FormUtil::input('end_date', '', 'Дата окончания',
                'date', false, $value ? $value->end_date : '')
        );
    }
}
