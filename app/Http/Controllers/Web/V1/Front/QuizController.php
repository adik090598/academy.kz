<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuestionWebForm;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Models\Entities\Answer;
use App\Models\Entities\Question;
use App\Models\Entities\Quiz;
use App\Models\Entities\Subject;
use App\Models\Entities\Order;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Psy\Util\Json;

class QuizController extends WebBaseController
{
        public function index(){
            $quizzes = Quiz::orderBy('created_at', 'desc')->paginate(10);
            $subjects = Subject::all();
            return $this->frontPagesView('test.index', compact('quizzes', 'subjects'));
        }

        public function getQuiz(Request $request)
        {   $quiz = Quiz::find($request->quiz);
            return $this->frontPagesView('test.checkout', compact('quiz'));
        }

    public function sendQuizRequest(Request $request){
            $order = Order::create([
                'status'=>1,
                'quiz_id'=>$request->quiz,
                'user_id'=>$request->getUser()
            ]);
        }

        public function attempt(Request $request){
            $questions = Quiz::with('questions.answers')->find($request->id);
            //$questions->toJson(JSON_PRETTY_PRINT);
            $questions->toArray();
//
//            Order::create([
//                'status'  => 1,
//                'quiz_id' => $request->id,
//                'user_id' => Auth::id(),
//                'transaction_id' => 1
//            ]);

            return $this->frontPagesView('attempt_quiz', compact('questions'));
        }

        public function submit(Request $request){
            $arr = explode(',', $request->get("userAnswers"));
            $result = 0;
            $userAnswers = [];
            $resString = '';
           // dd($arr);
            foreach ($arr as $a) {
                $answer = Answer::find($a);
                if($answer->is_right){
                    $qustion = Question::with('answers')->find($answer->question_id);


                    $userAnswers[] = $qustion;
                    $result++;
                }
               // $result++;
            }

            $resString = $result/count($arr)*100 .'%';
            $count = count($arr);
            return $this->frontPagesView('result', compact('userAnswers', 'result','resString','count'));
           // dd($result);
        }
}
