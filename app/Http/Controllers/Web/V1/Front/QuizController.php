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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Psy\Util\Json;

class QuizController extends WebBaseController
{
        public function index(){
            $quizzes = Quiz::orderBy('created_at', 'desc')->paginate(10);
            $subjects = Subject::all();
            return $this->frontPagesView('test.index', compact('quizzes', 'subjects'));
        }

        public function attempt(Request $request){
            $questions = Quiz::with('questions.answers')->find($request->id);
            //$questions->toJson(JSON_PRETTY_PRINT);
            $questions->toArray();
            return $this->frontPagesView('attempt_quiz', compact('questions'));
        }

        public function submit(Request $request){
            $arr = explode(',', $request->get("userAnswers"));
            $result = 0;

            foreach ($arr as $a) {

                $answer = Answer::find($a);
                if($answer->is_right){
                    $result++;
                }

               // $result++;
            }
            dd($result);
        }
}
