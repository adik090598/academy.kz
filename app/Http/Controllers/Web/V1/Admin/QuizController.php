<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Http\Requests\Web\V1\QuizEditWebRequest;
use App\Http\Requests\Web\V1\QuizWebRequest;
use App\Models\Entities\Quiz;
use App\Models\Entities\Question;
use App\Models\Entities\Answer;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends WebBaseController
{
    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $quizzes = Quiz::orderBy('created_at', 'desc')->paginate(10);
        $quiz_web_form = QuizWebForm::inputGroups(null);
        return $this->adminPagesView('quiz.index', compact('quizzes', 'quiz_web_form'));
    }

    public function create() {
        $quiz_web_form = QuizWebForm::inputGroups(null);
        return $this->adminPagesView('quiz.create', compact( 'quiz_web_form'));

    }
    public function store(QuizWebRequest $request)
    {
        try {
            $path = $this->fileService->store($request->image, Quiz::IMAGE_DIRECTORY);

            Quiz::create([
                'name' => $request->name,
                'image_path' => $path,
                'description' => $request->description,
                'price' => $request->price,
                'duration' =>$request->duration,
                'subject_id' => $request->subject_id
            ]);
        } catch (\Exception $exception) {
            if($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }
        $this->added();
        return redirect()->route('quiz.index');
    }

    public function edit(QuizEditWebRequest $request) {
        $quiz = Quiz::find($request->id);
        $quiz_web_form = QuizWebForm::inputGroups($quiz);
        return $this->adminPagesView('quiz.edit', compact( 'quiz_web_form', 'quiz'));
    }

    public function update(QuizWebRequest $request)
    {
        $quiz = Quiz::find($request->id);
        $old_path = $quiz->image_path;
        $path = null;
        if($request->image) {
            $path = $this->fileService->updateWithRemoveOrStore($request->image, Quiz::IMAGE_DIRECTORY, $old_path);
        }
        try {
            $quiz->update([
                'name' => $request->name,
                'image_path' => $path ? $path : $old_path,
                'description' => $request->description,
                'price' => $request->price,
                'duration' =>$request->duration,
                'subject_id' => $request->subject_id
            ]);
            $this->edited();
            return redirect()->route('quiz.index');
        } catch (\Exception $exception) {
            if($path) $this->fileService->remove($path);
            throw new WebServiceExplainedException($exception->getMessage());
        }
    }

    public function delete(QuizWebRequest $request)
    {
        Quiz::destroy($request->id);
        $this->deleted();
        return redirect()->route('quiz.index');
    }

    public function getQuizById(Request $request)
    {
        $quiz1 = Quiz::with('questions')->find($request->id);

        $questions = Question::select('question_text')->with('answers')
            ->inRandomOrder()
            ->where('quiz_id',$request->id)
            ->get();
        dd($questions);
        return $this->adminPagesView('quiz.quiz', compact('questions'));
    }

    public function getQuestions($id)
    {
        $quiztest = Question::select('question_text')->where('test_id',$id)
            ->with(['answers' => function ($query) {
                $query->select('answer','points')->inRandomOrder();
            }])
            ->inRandomOrder()
            ->whereHas('answers')
            ->get();

        return $quiztest;

    }

}
