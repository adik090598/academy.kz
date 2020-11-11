<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Models\Entities\Quiz;
use Illuminate\Http\Request;

class QuizController extends WebBaseController
{
        public function index(){
            $quizzes = Quiz::orderBy('created_at', 'desc')->paginate(10);
            return $this->frontPagesView('test.index', compact('quizzes'));
        }
}
