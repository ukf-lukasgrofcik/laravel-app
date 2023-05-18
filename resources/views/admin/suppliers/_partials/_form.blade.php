@csrf

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control {{ $errors->has("name") ? 'is-invalid' : '' }}" id="name" placeholder="Name" value="{{ old('name', $supplier->name ?? '') }}">
        @include('admin._partials._error', [ 'column' => "name" ])
    </div>

    <div class="col-sm-6">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" class="form-control {{ $errors->has("address") ? 'is-invalid' : '' }}" id="address" placeholder="Address" value="{{ old('address', $supplier->address ?? '') }}">
        @include('admin._partials._error', [ 'column' => "address" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="city" class="form-label">City</label>
        <input type="text" name="city" class="form-control {{ $errors->has("city") ? 'is-invalid' : '' }}" id="city" placeholder="City" value="{{ old('city', $supplier->city ?? '') }}">
        @include('admin._partials._error', [ 'column' => "city" ])
    </div>

    <div class="col-sm-6">
        <label for="postal_code" class="form-label">Postal Code</label>
        <input type="text" name="postal_code" class="form-control {{ $errors->has("postal_code") ? 'is-invalid' : '' }}" id="postal_code" placeholder="Postal Code" value="{{ old('postal_code', $supplier->postal_code ?? '') }}">
        @include('admin._partials._error', [ 'column' => "postal_code" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="email" class="form-label">E-mail</label>
        <input type="text" name="email" class="form-control {{ $errors->has("email") ? 'is-invalid' : '' }}" id="email" placeholder="E-mail" value="{{ old('email', $supplier->email ?? '') }}">
        @include('admin._partials._error', [ 'column' => "email" ])
    </div>

    <div class="col-sm-6">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control {{ $errors->has("phone") ? 'is-invalid' : '' }}" id="phone" placeholder="Phone" value="{{ old('phone', $supplier->phone ?? '') }}">
        @include('admin._partials._error', [ 'column' => "phone" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="business_id" class="form-label">Business ID</label>
        <input type="text" name="business_id" class="form-control {{ $errors->has("business_id") ? 'is-invalid' : '' }}" id="business_id" placeholder="Business ID" value="{{ old('business_id', $supplier->business_id ?? '') }}">
        @include('admin._partials._error', [ 'column' => "business_id" ])
    </div>

    <div class="col-sm-6">
        <label for="tax_id" class="form-label">Tax ID</label>
        <input type="text" name="tax_id" class="form-control {{ $errors->has("tax_id") ? 'is-invalid' : '' }}" id="tax_id" placeholder="Tax ID" value="{{ old('tax_id', $supplier->tax_id ?? '') }}">
        @include('admin._partials._error', [ 'column' => "tax_id" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="vat_registration_number" class="form-label">Vat Registration Number</label>
        <input type="text" name="vat_registration_number" class="form-control {{ $errors->has("vat_registration_number") ? 'is-invalid' : '' }}" id="vat_registration_number" placeholder="Vat Registration Number" value="{{ old('vat_registration_number', $supplier->vat_registration_number ?? '') }}">
        @include('admin._partials._error', [ 'column' => "vat_registration_number" ])
    </div>

    <div class="col-sm-6">
        <label for="iban" class="form-label">IBAN</label>
        <input type="text" name="iban" class="form-control {{ $errors->has("iban") ? 'is-invalid' : '' }}" id="iban" placeholder="IBAN" value="{{ old('iban', $supplier->iban ?? '') }}">
        @include('admin._partials._error', [ 'column' => "iban" ])
    </div>
</div>

<div class="row mt-3 mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>
