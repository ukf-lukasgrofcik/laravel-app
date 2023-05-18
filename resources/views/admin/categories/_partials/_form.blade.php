@csrf

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control {{ $errors->has("name") ? 'is-invalid' : '' }}" id="name" placeholder="Name" value="{{ old('name', $category->name ?? '') }}">
        @include('admin._partials._error', [ 'column' => "name" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-12">
        <label for="description" class="form-label">Description</label>
        <input type="text" name="description" class="form-control {{ $errors->has("description") ? 'is-invalid' : '' }}" id="description" placeholder="Description" value="{{ old('description', $category->description ?? '') }}">
        @include('admin._partials._error', [ 'column' => "description" ])
    </div>
</div>

<div class="row mt-3 mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>
