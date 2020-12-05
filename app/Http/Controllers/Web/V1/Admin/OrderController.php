<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Exceptions\Web\WebServiceExplainedException;
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
        return $this->adminPagesView('order.index', compact('orders'));
    }

    public function accept($id) {
        $order = $this->checkOrder($id);
        $order->status = Order::ACCEPTED;
        $order->save();
        $this->edited();
        return redirect()->route('order.index');
    }

    private function checkOrder($id) {
        $order = Order::where('id', $id)->where('status', Order::PROCESS)->first();
        if(!$order) {
            throw new WebServiceExplainedException('Заявка не найдена!');
        }
        return $order;
    }

}
