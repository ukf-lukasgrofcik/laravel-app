<div class="row mt-3" data-index="{{ $index ?? '' }}">
    <div class="col-sm-3">
        <label for="items[{{ $index ?? '' }}][name]" class="form-label">Name</label>
        <input type="text" name="{{ isset($index) ? "items[$index][name]" : '' }}" class="form-control {{ $errors->has("items." . ($index ?? '') . ".name") ? 'is-invalid' : '' }}" id="items[{{ $index ?? '' }}][name]" value="{{ $item->name ?? '' }}">
        @include('admin._partials._error', [ 'column' => "items." . ($index ?? '') . ".name" ])
    </div>

    <div class="col-sm-3">
        <label for="items[{{ $index ?? '' }}][price]" class="form-label">Price (€)</label>
        <input type="number" name="{{ isset($index) ? "items[$index][price]" : '' }}" data-index="{{ $index ?? '' }}" step="0.01" min="0" class="form-control order-item-price-parse {{ $errors->has("items." . ($index ?? '') . ".price") ? 'is-invalid' : '' }}" id="items[{{ $index ?? '' }}][price]" value="{{ $item->price ?? '' }}">
        @include('admin._partials._error', [ 'column' => "items." . ($index ?? '') . ".price" ])
    </div>

    <div class="col-sm-3">
        <label for="items[{{ $index ?? '' }}][quantity]" class="form-label">Quantity</label>
        <input type="number" name="{{ isset($index) ? "items[$index][quantity]" : '' }}" data-index="{{ $index ?? '' }}" step="1" min="1" class="form-control order-item-price-parse {{ $errors->has("items." . ($index ?? '') . ".quantity") ? 'is-invalid' : '' }}" id="items[{{ $index ?? '' }}][quantity]" value="{{ $item->quantity ?? 1 }}">
        @include('admin._partials._error', [ 'column' => "items." . ($index ?? '') . ".quantity" ])
    </div>

    <div class="col-sm-3">
        <label for="items[{{ $index ?? '' }}][full_price]" class="form-label">Full price (€)</label>
        <input type="number" name="{{ isset($index) ? "items[$index][full_price]" : '' }}" step="0.01" min="0" class="form-control order-item-full-price {{ $errors->has("items." . ($index ?? '') . ".full_price") ? 'is-invalid' : '' }}" id="items[{{ $index ?? '' }}][full_price]" value="{{ $item->full_price ?? '' }}" readonly>
        @include('admin._partials._error', [ 'column' => "items." . ($index ?? '') . ".full_price" ])
    </div>
</div>
