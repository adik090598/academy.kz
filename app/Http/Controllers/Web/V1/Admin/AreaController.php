<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\AreaWebForm;
use App\Http\Requests\Web\V1\AreaWebRequest;
use App\Models\Entities\Area;

class AreaController extends WebBaseController
{
    public function index()
    {
        $areas = Area::orderBy('created_at', 'desc')->with('city')->paginate(10);
        $area_web_form = AreaWebForm::inputGroups(null);

        return $this->adminPagesView('area.index', compact('areas', 'area_web_form'));
    }

    public function create()
    {
        $area_web_form = AreaWebForm::inputGroups(null);
        return $this->adminPagesView('area.create', compact('area_web_form'));
    }

    public function store(AreaWebRequest $request)
    {
        Area::create([
            'name' => $request->name,
            'city_id' => $request->city_id
        ]);
        $this->added();
        return redirect()->route('area.index');
    }

    public function update(AreaWebRequest $request)
    {
        $area = Area::where('id', $request->id)->with('city')->first();
        $area->update([
            'name' => $request->name,
            'city_id' => $request->city_id
        ]);
        $this->edited();
        return redirect()->route('area.index');
    }
}
