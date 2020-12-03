<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\RegionWebForm;
use App\Http\Requests\Web\V1\RegionWebRequest;
use App\Models\Entities\Region;

class RegionController extends WebBaseController
{
    public function index()
    {
        $regions = Region::orderBy('created_at', 'desc')->paginate(10);
        $region_web_form = RegionWebForm::inputGroups(null);

        return $this->adminPagesView('region.index', compact('regions', 'region_web_form'));
    }

    public function create()
    {
        $region_web_form = RegionWebForm::inputGroups(null);
        return $this->adminPagesView('region.create', compact('region_web_form'));
    }

    public function store(RegionWebRequest $request)
    {
        Region::create([
            'name' => $request->name]);
        $this->added();
        return redirect()->route('region.index');
    }

    public function update(RegionWebRequest $request)
    {
        $region = Region::find($request->id);
        $region->update([
            'name' => $request->name]);
        $this->edited();
        return redirect()->route('region.index');
    }

}
