<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateOrderRequest;
use App\Http\Requests\Admin\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Supplier;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class OrdersController extends Controller
{

    public function index() : View | Application | Factory
    {
        $orders = Order::withCount('items')->with([ 'supplier' ])->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function create() : View | Application | Factory
    {
        $order_number = Order::generateOrderNumber();
        $suppliers = Supplier::all();

        return view('admin.orders.create', compact('suppliers', 'order_number'));
    }

    public function store(CreateOrderRequest $request) : RedirectResponse
    {
        $order = Order::create($request->all());

        foreach ($request->items as $item) {
            $order->items()->create($item);
        }

        session()->flash('alert', 'success');
        session()->flash('message', "Order <b>$order->number</b> has been created.");

        return redirect()->route('orders.index');
    }

    public function edit(Order $order) : View | Application | Factory
    {
        $suppliers = Supplier::all();

        return view('admin.orders.edit', compact('order', 'suppliers'));
    }

    public function update(UpdateOrderRequest $request, Order $order) : RedirectResponse
    {
        $order->update($request->all());

        $order->items()->delete();

        foreach ($request->items as $item) {
            $order->items()->create($item);
        }

        session()->flash('alert', 'success');
        session()->flash('message', "Order <b>$order->number</b> has been edited.");

        return back();
    }

    public function destroy(Order $order) : RedirectResponse
    {
        $order->delete();

        session()->flash('alert', 'success');
        session()->flash('message', "Order <b>$order->number</b> has been deleted.");

        return back();
    }

}
