<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\SubjectWebForm;
use App\Http\Requests\Web\V1\SubjectWebRequest;
use Illuminate\Http\Request;
use App\Models\Entities\Subject;

class SubjectController extends WebBaseController
{
    public function index(){
        $subjects = Subject::orderBy('created_at', 'desc')->paginate(10);
        $subject_web_form = SubjectWebForm::inputGroups(null);

        return $this->adminPagesView('subject.index', compact('subjects', 'subject_web_form'));
    }

    public function create() {
        $subject_web_form = SubjectWebForm::inputGroups(null);
        return $this->adminPagesView('subject.create', compact( 'subject_web_form'));
    }

    public function store(SubjectWebRequest $request)
    {
        Subject::create([
            'name' => $request->name]);
        $this->added();
        return redirect()->route('subject.index');
    }

    public function update(SubjectWebRequest $request)
    {
        $subject = Subject::find($request->id);
        $subject->update([
            'name' => $request->name]);
        $this->edited();
        return redirect()->route('subject.index');
    }

    public function delete(SubjectWebRequest $request)
    {
        Subject::destroy($request->id);
        $this->deleted();
        return redirect()->route('subject.index');
    }
}
