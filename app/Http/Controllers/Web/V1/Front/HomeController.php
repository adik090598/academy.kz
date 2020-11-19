<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Quiz;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class HomeController extends WebBaseController
{
    public function index() {
        $quizzes = Quiz::orderBy('created_at', 'desc')->withCount('questions')->with('subject')->get()->take(3);
        return $this->frontPagesView('welcome', compact('quizzes'));
    }

    public function home() {
        return $this->frontPagesView('home');
    }

    public function login() {
        return $this->frontPagesView('login');
    }

    public function register() {
        return $this->frontPagesView('register');
    }

    public function attempt() {
        return $this->frontPagesView('attempt_quiz');
    }
}
