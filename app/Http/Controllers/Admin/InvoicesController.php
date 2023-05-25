<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateInvoiceRequest;
use App\Http\Requests\Admin\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class InvoicesController extends Controller
{

    public function index() : View | Application | Factory
    {
        $invoices = Invoice::with([ 'order' ])->paginate(10);

        return view('admin.invoices.index', compact('invoices'));
    }

    public function create() : View | Application | Factory
    {
        $invoice_number = Invoice::generateInvoiceNumber();
        $order = Order::findOrFail( request('order_id') );

        return view('admin.invoices.create', compact('invoice_number', 'order'));
    }

    public function store(CreateInvoiceRequest $request) : RedirectResponse
    {
        $invoice = Invoice::create($request->all());

        session()->flash('alert', 'success');
        session()->flash('message', "Invoice <b>$invoice->number</b> has been created.");

        return redirect()->route('invoices.index');
    }

    public function edit(Invoice $invoice) : View | Application | Factory
    {
        $order = $invoice->order;

        return view('admin.invoices.edit', compact('invoice', 'order'));
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice) : RedirectResponse
    {
        $invoice->payment_date = $request->payment_date;
        $invoice->save();

        session()->flash('alert', 'success');
        session()->flash('message', "Invoice <b>$invoice->number</b> has been edited.");

        return back();
    }

    public function destroy(Invoice $invoice) : RedirectResponse
    {
        $invoice->delete();

        session()->flash('alert', 'success');
        session()->flash('message', "Invoice <b>$invoice->number</b> has been deleted.");

        return back();
    }

}
