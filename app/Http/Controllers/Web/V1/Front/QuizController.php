<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Answer;
use App\Models\Entities\Question;
use App\Models\Entities\Quiz;
use App\Models\Entities\QuizResultAnswer;
use App\Models\Entities\Subject;
use App\Models\Entities\Order;
use App\Models\Entities\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends WebBaseController
{
    public function index()
    {
        $quizzes = Quiz::orderBy('created_at', 'desc')->has('questions')->paginate(10);
        $subjects = Subject::all();
        return $this->frontPagesView('quiz.index', compact('quizzes', 'subjects'));
    }

    public function quiz(Request $request)
    {
        $has_permission = false;
        $quiz = $this->checkQuiz($request->id);
        $order = Order::where('quiz_id', $request->id);
        return $this->frontPagesView('quiz.single', compact('quiz'));
    }

    public function pass(Request $request)
    {
        $questions = $this->checkQuiz($request->id);
        //$questions->toJson(JSON_PRETTY_PRINT);
        $questions->toArray();
//
            Order::create([
                'status'  => 1,
                'quiz_id' => $request->id,
                'user_id' => Auth::id(),
//                'transaction_id' => 1
            ]);
        return $this->frontPagesView('quiz.pass', compact('questions'));
    }

    public function submit(Request $request)
    {
        $arr = explode(',', $request->get("userAnswers"));
        $result = 0;
        $userAnswers = [];

        foreach ($arr as $a) {
            $answer = Answer::find($a);
            if ($answer){
            $qustion = Question::find($answer->question_id);
            $qustion->answer = $answer;
            $userAnswers[] = $qustion;
            if ($answer->is_right) {
                $result++;
            }
            $quiz = Quiz::with('questions')->find($qustion->quiz_id);
                $count = $quiz->questions->count();
                $resString = $result / $count * 100 . '%';
            } else{
                $count = 0;
                $resString = '0%';
            }
        }

        $quiz_result = QuizResult::create([
            'user_id'   => Auth::id(),
            'quiz_id'   => $quiz->id,
            'order_id'  => 1,
            'result'    => $result/$count
        ]);

        foreach ($arr as $a) {
            $answer = Answer::find($a);
            if ($answer) {
                QuizResultAnswer::create([
                   'quiz_result_id'  => $quiz_result->id,
                    'answer_id'      => $answer->id,
                    'is_right'       =>  $answer->is_right
                ]);
            }
        }

        return $this->frontPagesView('quiz.result', compact('userAnswers', 'result', 'resString', 'count'));
    }

    private function checkQuiz($id) {
        $quiz = Quiz::where('id', $id)->with('questions.answers')->first();
        if(!$quiz) throw new WebServiceExplainedException('Тест не найден!');
        return $quiz;
    }
}
