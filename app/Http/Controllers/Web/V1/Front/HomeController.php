<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class HomeController extends WebBaseController
{
    public function index() {

        $agent = new Agent();
        return $this->frontPagesView('welcome', compact('agent', $agent));
    }

    public function home() {
        $agent = new Agent();
        return $this->frontPagesView('home', compact('agent', $agent));
    }

    public function login() {
        return $this->frontPagesView('login');
    }

    public function register() {
        return $this->frontPagesView('register');
    }

}
