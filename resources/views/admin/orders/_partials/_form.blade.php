@csrf

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="number" class="form-label">Number</label>
        <input type="text" name="number" class="form-control {{ $errors->has("number") ? 'is-invalid' : '' }}" id="number" value="{{ $order->number ?? $order_number }}" readonly>
        @include('admin._partials._error', [ 'column' => "number" ])
    </div>

    <div class="col-sm-6">
        <label for="supplier_id" class="form-label">Supplier</label>
        <select id="supplier_id" name="supplier_id" class="order-supplier-select form-select {{ $errors->has("supplier_id") ? 'is-invalid' : '' }}">
            <option value>Choose supplier</option>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ isset($order) && $supplier->id == $order->supplier_id ? 'selected' : '' }} data-name="{{ $supplier->name }}" data-business-id="{{ $supplier->business_id }}" data-iban="{{ $supplier->iban }}">{{ "$supplier->name - $supplier->business_id" }}</option>
            @endforeach
        </select>
        @include('admin._partials._error', [ 'column' => "supplier_id" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-4">
        <label for="supplier-name" class="form-label">Supplier - Name</label>
        <input type="text" class="form-control" id="supplier-name" value="{{ $order->supplier->name ?? '' }}" readonly>
    </div>

    <div class="col-sm-4">
        <label for="supplier-business-id" class="form-label">Supplier - Business ID</label>
        <input type="text" class="form-control" id="supplier-business-id" value="{{ $order->supplier->business_id ?? '' }}" readonly>
    </div>

    <div class="col-sm-4">
        <label for="supplier-iban" class="form-label">Supplier - IBAN</label>
        <input type="text" class="form-control" id="supplier-iban" value="{{ $order->supplier->iban ?? '' }}" readonly>
    </div>
</div>

<div class="border mt-3 p-4">

    <div class="row">
        <div class="col-sm-12">
            <h5>Items</h5>
        </div>
    </div>

    <div id="order-items-pattern" class="d-none">
        @include('admin.orders._partials._order_item_pattern')
    </div>

    <div id="order-items">
        @include('admin.orders._partials._order_item_pattern', [ 'index' => 0 ])
    </div>

    <div class="row mt-3">
        <div class="col-sm-12">
            <button id="order-items-add" type="button" class="btn btn-success">Add</button>
            <button id="order-items-remove" type="button" class="btn btn-danger">Remove</button>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>
