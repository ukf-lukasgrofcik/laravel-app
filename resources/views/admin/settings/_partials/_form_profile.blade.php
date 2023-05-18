@csrf

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control {{ $errors->has("name") ? 'is-invalid' : '' }}" id="name" placeholder="Name" value="{{ old('name', auth()->user()->name ?? '') }}">
        @include('admin._partials._error', [ 'column' => "name" ])
    </div>

    <div class="col-sm-6">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" name="surname" class="form-control {{ $errors->has("surname") ? 'is-invalid' : '' }}" id="surname" placeholder="Surname" value="{{ old('surname', auth()->user()->surname ?? '') }}">
        @include('admin._partials._error', [ 'column' => "surname" ])
    </div>
</div>

<div class="row mt-3 mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>
