<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateSupplierRequest;
use App\Http\Requests\Admin\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class SuppliersController extends Controller
{

    public function index() : View | Application | Factory
    {
        $suppliers = Supplier::paginate(10);

        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function create() : View | Application | Factory
    {
        return view('admin.suppliers.create');
    }

    public function store(CreateSupplierRequest $request) : RedirectResponse
    {
        $supplier = Supplier::create($request->all());

        session()->flash('alert', 'success');
        session()->flash('message', "Supplier <b>$supplier->name</b> has been created.");

        return redirect()->route('suppliers.index');
    }

    public function edit(Supplier $supplier) : View | Application | Factory
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier) : RedirectResponse
    {
        $supplier->update($request->all());

        session()->flash('alert', 'success');
        session()->flash('message', "Supplier <b>$supplier->name</b> has been edited.");

        return back();
    }

    public function destroy(Supplier $supplier) : RedirectResponse
    {
        $supplier->delete();

        session()->flash('alert', 'success');
        session()->flash('message', "Supplier <b>$supplier->name</b> has been deleted.");

        return back();
    }

}
