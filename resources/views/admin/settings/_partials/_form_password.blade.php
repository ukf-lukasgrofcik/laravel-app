@csrf

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control {{ $errors->has("password") ? 'is-invalid' : '' }}" id="password" placeholder="••••••••">
        @include('admin._partials._error', [ 'column' => "password" ])
    </div>

    <div class="col-sm-6">
        <label for="password_confirmation" class="form-label">Confirm password</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="••••••••">
    </div>
</div>

<div class="row mt-3 mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>
