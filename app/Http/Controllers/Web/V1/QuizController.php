<?php

namespace App\Http\Controllers\Web\V1;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Http\Requests\Web\V1\QuizWebRequest;
use App\Models\Models\Entities\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends WebBaseController
{
    public function index()
    {
        $quizzes = Quiz::orderBy('created_at', 'desc')->paginate(10);
        $quiz_web_form = QuizWebForm::inputGroups(null);
        return $this->adminPagesView('quiz.index', compact('quizzes', 'quiz_web_form'));
    }

    public function store(QuizWebRequest $request)
    {
        Quiz::create([
            'name' => $request->name
        ]);
        $this->added();
        return redirect()->route('quiz.index');
    }

    public function update(QuizWebRequest $request)
    {
        $quiz = Quiz::find($request->id);
        $quiz->update([
            'name' => $request->name
        ]);
        $this->edited();
        return redirect()->route('quiz.index');
    }

    public function delete(QuizWebRequest $request)
    {
        Quiz::destroy($request->id);
        $this->deleted();
        return redirect()->route('quiz.index');
    }


}
