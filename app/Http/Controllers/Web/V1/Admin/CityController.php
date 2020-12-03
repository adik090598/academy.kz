<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CityWebForm;
use App\Http\Requests\Web\V1\CityWebRequest;
use App\Models\Entities\City;

class CityController extends WebBaseController
{
    public function index()
    {
        $cities = City::orderBy('created_at', 'desc')->with('region')->paginate(10);
        $city_web_form = CityWebForm::inputGroups(null);

        return $this->adminPagesView('city.index', compact('cities', 'city_web_form'));
    }

    public function create()
    {
        $city_web_form = CityWebForm::inputGroups(null);
        return $this->adminPagesView('city.create', compact('city_web_form'));
    }

    public function store(CityWebRequest $request)
    {
        City::create([
            'name' => $request->name,
            'region_id' => $request->region_id
        ]);
        $this->added();
        return redirect()->route('city.index');
    }

    public function update(CityWebRequest $request)
    {
        $city = City::where('id', $request->id)->with('region')->first();
        $city->update([
            'name' => $request->name,
            'region_id' => $request->region_id
            ]);
        $this->edited();
        return redirect()->route('city.index');
    }
}
