<?php


namespace App\Http\Forms\Web\V1;


use App\Core\Interfaces\WithForm;
use App\Http\Forms\Web\FormUtil;

class UserWebForm implements WithForm
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
            FormUtil::input('avatar_path', '', null,
                'file', !$value ? true : false),
            FormUtil::input('surename', 'Фамилия', 'Фамилия',
                'text', false, $value ? $value->surname : ''),
            FormUtil::input('name', 'Имя', 'Имя',
                'text', false, $value ? $value->name : ''),
            FormUtil::input('patronymic', 'Отчество', 'Отчество',
                'text', false, $value ? $value->father_name : ''),
            FormUtil::input('email', 'Электронная почта', 'Электронная почта',
                'text', false, $value ? $value->email : ''),
            FormUtil::input('password', null, 'Пароль',
                'password', false, null),
            FormUtil::input('confirm_password', '', 'Повторите пароль',
                'password', false, '')
        );

    }
}
