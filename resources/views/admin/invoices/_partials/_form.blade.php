@csrf

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="number" class="form-label">Number</label>
        <input type="text" name="number" class="form-control {{ $errors->has("number") ? 'is-invalid' : '' }}" id="number" value="{{ $invoice->number ?? $invoice_number }}" readonly>
        @include('admin._partials._error', [ 'column' => "number" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="order-name" class="form-label">Order</label>
        <input type="text" class="form-control" id="order-name" value="{{ $order->number ?? '' }}" readonly>
        @if($order)
            <input type="hidden" name="order_id" value="{{ $order->id }}">
        @endif
    </div>

    <div class="col-sm-6">
        <label for="supplier-name" class="form-label">Supplier</label>
        <input type="text" class="form-control" id="supplier-name" value="{{ $order->supplier->name ?? '' }}" readonly>
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-4">
        <label for="price" class="form-label">Price (€)</label>
        <input type="text" class="form-control" id="price" value="{{ $order->price ?? '' }}" readonly>
    </div>

    <div class="col-sm-4">
        <label for="vat" class="form-label">Vat (€)</label>
        <input type="text" class="form-control" id="vat" value="{{ $order->vat ?? '' }}" readonly>
    </div>

    <div class="col-sm-4">
        <label for="price_vat" class="form-label">Price Vat (€)</label>
        <input type="text" class="form-control" id="price_vat" value="{{ $order->price_vat ?? '' }}" readonly>
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="due_date" class="form-label">Due date</label>
        <input type="date" name="due_date" class="form-control {{ $errors->has("due_date") ? 'is-invalid' : '' }}" id="due_date" value="{{ $invoice->due_date ?? '' }}" {{ isset($invoice) ? 'readonly' : '' }}>
        @include('admin._partials._error', [ 'column' => "due_date" ])
    </div>

    @if( isset($invoice) )
        <div class="col-sm-6">
            <label for="payment_date" class="form-label">Payment date</label>
            <input type="date" name="payment_date" class="form-control {{ $errors->has("payment_date") ? 'is-invalid' : '' }}" id="payment_date" value="{{ $invoice->payment_date }}">
            @include('admin._partials._error', [ 'column' => "payment_date" ])
        </div>
    @endif
</div>

<div class="row mt-3 mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>
