<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\OrderWebForm;
use App\Http\Forms\Web\V1\QuizWebForm;
use App\Models\Entities\Quiz;
use App\Models\Entities\Order;
use App\Services\Common\V1\Support\FileService;
use Illuminate\Http\Request;

class OrderController extends WebBaseController
{
    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return $this->adminPagesView('order.index', compact('orders'));
    }
}
