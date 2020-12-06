<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Models\Entities\Order;
use App\Models\Entities\QuizResult;
use Illuminate\Http\Request;

class QuizResultController extends WebBaseController
{
    public function index()
    {
        $results = QuizResult::orderBy('created_at', 'desc')->paginate(10);
        return $this->adminPagesView('result.index', compact('results'));
    }

    public function userResult(Request $request){
        $result = QuizResult::find($request->id);
        return $this->adminPagesView('result.result', compact('result'));
    }

}
