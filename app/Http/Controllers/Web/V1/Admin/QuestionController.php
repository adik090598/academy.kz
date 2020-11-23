<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuestionWebForm;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Http\Requests\Web\V1\QuestionWebRequest;
use App\Http\Requests\Web\V1\QuestionDeleteWebRequest;
use App\Models\Entities\Answer;
use App\Models\Entities\Question;
use App\Models\Entities\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends WebBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questions = Quiz::with('questions.answers')->find($request->id);
        $question_web_form = QuestionWebForm::inputGroups(null);
        return $this->adminPagesView('quiz.quiz', compact('questions','question_web_form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $quiz_id = $request->get('quiz_id');
        $question_web_form = QuestionWebForm::inputGroups(null);
        return $this->adminPagesView('question.create', compact('question_web_form', 'quiz_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionWebRequest $request)
    {
        $id = $request->get('quiz_id');
        try {
            DB::beginTransaction();
            $question = Question::create([
                'question_text' => $request->name,
                'quiz_id' => $id
            ]);
            $answers = [];
            $now = now();
            foreach ($request->answers as $answer){
                $answers[] = [
                    'question_id' => $question->id,
                    'answer' => $answer['text'],
                    'is_right' => $answer['check'],
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
            Answer::insert($answers);
            $this->added();
            DB::commit();
            $question_web_form = QuestionWebForm::inputGroups(null);
            return redirect()->route('question.index', compact("id", "question_web_form"));
        }
        catch (\Exception $e){
            DB::rollBack();
            throw new WebServiceExplainedException($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $question = Question::find($request->id)-with('answers');
        $question_web_form = QuestionWebForm::inputGroups($question);

        return $this->adminPagesView('question.edit', compact( 'question_web_form', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('quiz_id');
        try {
            DB::beginTransaction();
            $question = Question::create([
                'question_text' => $request->name,
                'quiz_id' => $id
            ]);
            $answers = [];
            $now = now();
            foreach ($request->answers as $answer){
                $answers[] = [
                    'question_id' => $question->id,
                    'answer' => $answer['text'],
                    'is_right' => $answer['check'],
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
            Answer::insert($answers);
            $this->added();
            DB::commit();
            $question_web_form = QuestionWebForm::inputGroups(null);
            return redirect()->route('question.index', compact("id", "question_web_form"));
        }
        catch (\Exception $e){
            DB::rollBack();
            throw new WebServiceExplainedException($e->getMessage());
        }
    }

    public function delete(QuestionDeleteWebRequest $request)
    {
        $question = Question::find($request->id);
        $id = $question->quiz->id;

        $question->answers()->delete();
        $question->delete();
        $this->deleted();
        return redirect()->route('question.index', compact('id'));
    }

    /**s
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
