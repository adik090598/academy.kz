<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Models\Models\Entities\Quiz;
use Illuminate\Http\Request;

class TestController extends WebBaseController
{
        public function index(){
            $quizzes = Quiz::orderBy('created_at', 'asc')->paginate(10);
            $quiz_web_form = QuizWebForm::inputGroups(null);
            return $this->frontPagesView('test.index', compact('quizzes'));
        }
}
