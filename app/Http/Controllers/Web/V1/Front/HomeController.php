<?php

namespace App\Http\Controllers\Web\V1\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use Illuminate\Http\Request;

class HomeController extends WebBaseController
{
    public function index() {
        return $this->frontPagesView('welcome');
    }

    public function home() {
        return $this->frontPagesView('home');
    }
}
