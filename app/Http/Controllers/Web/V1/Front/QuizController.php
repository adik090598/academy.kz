<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuestionWebForm;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Models\Entities\Quiz;
use Illuminate\Http\Request;
use Psy\Util\Json;

class QuizController extends WebBaseController
{
        public function index(){
            $quizzes = Quiz::orderBy('created_at', 'desc')->paginate(10);
            return $this->frontPagesView('test.index', compact('quizzes'));
        }

        public function attempt(Request $request){
            $questions = Quiz::with('questions.answers')->find($request->id);
            //$questions->toJson(JSON_PRETTY_PRINT);
            $questions->toArray();
            return $this->frontPagesView('attempt_quiz', compact('questions'));}
}
