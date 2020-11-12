<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class HomeController extends WebBaseController
{
    public function index() {

        return $this->frontPagesView('welcome');
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
