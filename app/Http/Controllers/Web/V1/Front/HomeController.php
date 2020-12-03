<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Http\Forms\Web\V1\UserWebForm;
use App\Models\Entities\Category;
use App\Models\Entities\Quiz;
use App\Models\Entities\Core\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use App\Services\Common\V1\Support\FileService;

class HomeController extends WebBaseController
{
    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index() {
        $quizzes = Quiz::orderBy('created_at', 'desc')
            ->where('category_id', '!=', Category::COMPETITION)
            ->withCount('questions')
            ->with('subject')->get()->take(3);
        return $this->frontPagesView('welcome', compact('quizzes'));
    }
}
