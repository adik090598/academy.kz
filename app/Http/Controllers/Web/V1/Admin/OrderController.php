<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\OrderWebForm;
use App\Models\Entities\Order;
use App\Services\Common\V1\Support\FileService;


class OrderController extends WebBaseController
{
    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        $order_web_form = new OrderWebForm(null);
        return $this->adminPagesView('order.index', compact('orders','order_web_form'));
    }
}
