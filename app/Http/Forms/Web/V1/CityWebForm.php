<?php


namespace App\Http\Forms\Web\V1;


use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Region;

class CityWebForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];
        if($value) {
            $array = FormUtil::input('id', 1, null,
                'numeric', true,
                $value->id, null, null, true);
        }
        $regions = Region::all();
        $region_selects = [];
        foreach ($regions as $region) {
            $region_selects[] = ['value' => $region->id, 'title' => $region->name,
                'selected' => $value ? $value->region_id == $region->id ? 'selected' : '' : ''];
        }
        return array_merge(
            $array,
            FormUtil::input('name', 'Шымкент', 'Название',
                'text', false, $value ? $value->name : ''),
            FormUtil::select('region_id', '', 'Регион',
                true, $region_selects)
        );
    }
}
