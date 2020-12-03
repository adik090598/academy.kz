<?php


namespace App\Http\Forms\Web\V1;


use App\Http\Forms\Web\FormUtil;
use App\Models\Entities\Area;

class SchoolWebForm
{
    public static function inputGroups($value = null): array
    {
        $array = [];
        if($value) {
            $array = FormUtil::input('id', 1, null,
                'numeric', true,
                $value->id, null, null, true);
        }
        $areas = Area::all();
        $area_selects = [];
        foreach ($areas as $area) {
            $area_selects[] = ['value' => $area->id, 'title' => $area->name,
                'selected' => $value ? $value->area_id == $area->id ? 'selected' : '' : ''];
        }
        return array_merge(
            $array,
            FormUtil::input('name', 'Шымкент', 'Название',
                'text', false, $value ? $value->name : ''),
            FormUtil::select('area_id', '', 'Районы',
                true, $area_selects)
        );
    }
}
