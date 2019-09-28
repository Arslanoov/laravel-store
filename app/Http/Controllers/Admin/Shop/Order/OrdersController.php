<?php

namespace App\Http\Controllers\Admin\Shop\Order;

use App\Entity\Shop\Order\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop\Order\CancelRequest;
use App\UseCases\Admin\Shop\Order\OrderManageService;

class OrdersController extends Controller
{
    private $service;

    public function __construct(OrderManageService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $query = $this->service->getOrders();
        $orders = $query->paginate(20);

        return view('admin.shop.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.shop.orders.show', compact('order'));
    }

    public function cancel(CancelRequest $request, Order $order)
    {
        $this->service->cancel($request, $order);

        return redirect()->route('admin.shop.orders.show', compact('order'));
    }

    public function pay(Order $order)
    {
        $this->service->makePaid($order);

        return redirect()->route('admin.shop.orders.show', compact('order'));
    }

    public function sent(Order $order)
    {
        $this->service->makeSent($order);

        return redirect()->route('admin.shop.orders.show', compact('order'));
    }

    public function complete(Order $order)
    {
        $this->service->makeCompleted($order);

        return redirect()->route('admin.shop.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $this->service->remove($order);

        return redirect()->route('admin.shop.orders.index');
    }
}