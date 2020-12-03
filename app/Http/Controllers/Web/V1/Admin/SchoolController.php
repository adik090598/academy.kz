<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\SchoolWebForm;
use App\Http\Requests\Web\V1\SchoolWebRequest;
use App\Models\Entities\School;

class SchoolController extends WebBaseController
{
    public function index()
    {
        $schools = School::orderBy('created_at', 'desc')->with('area')->paginate(10);
        $school_web_form = SchoolWebForm::inputGroups(null);

        return $this->adminPagesView('school.index', compact('schools', 'school_web_form'));
    }

    public function create()
    {
        $school_web_form = SchoolWebForm::inputGroups(null);
        return $this->adminPagesView('school.create', compact('school_web_form'));
    }

    public function store(SchoolWebRequest $request)
    {
        School::create([
            'name' => $request->name,
            'area_id' => $request->area_id
        ]);
        $this->added();
        return redirect()->route('school.index');
    }

    public function update(SchoolWebRequest $request)
    {
        $school = School::where('id', $request->id)->with('area')->first();
        $school->update([
            'name' => $request->name,
            'area_id' => $request->area_id
        ]);
        $this->edited();
        return redirect()->route('school.index');
    }
}
