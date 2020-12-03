<?php


namespace App\Http\Forms\Web\V1;


use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\City;

class AreaWebForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];
        if($value) {
            $array = FormUtil::input('id', 1, null,
                'numeric', true,
                $value->id, null, null, true);
        }
        $cities = City::all();
        $city_selects = [];
        foreach ($cities as $city) {
            $city_selects[] = ['value' => $city->id, 'title' => $city->name,
                'selected' => $value ? $value->city_id == $city->id ? 'selected' : '' : ''];
        }
        return array_merge(
            $array,
            FormUtil::input('name', 'Енбекшы', 'Название',
                'text', false, $value ? $value->name : ''),
            FormUtil::select('city_id', '', 'Город',
                true, $city_selects)
        );
    }
}
