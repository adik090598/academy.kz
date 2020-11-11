<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Http\Requests\Web\V1\QuestionWebRequest;
use App\Models\Entities\Answer;
use App\Models\Entities\Question;
use App\Models\Entities\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class QuestionController extends WebBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question_web_form = QuestionWebForm::inputGroups(null);
        return $this->adminPagesView('quiz.quiz', compact('question_web_form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionWebRequest $request)
    {
        $quiz_id = $request->get('quiz_id');
        try {
            DB::beginTransaction();
            $question = Question::create([
                'question_text' => $request->name,
                'quiz_id' => $quiz_id
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
            return redirect()->back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
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
