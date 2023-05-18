@csrf

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control {{ $errors->has("name") ? 'is-invalid' : '' }}" id="name" placeholder="Name" value="{{ old('name', $user->name ?? '') }}" {{ isset($user) ? 'disabled' : '' }}>
        @include('admin._partials._error', [ 'column' => "name" ])
    </div>

    <div class="col-sm-6">
        <label for="surname" class="form-label">Surname</label>
        <input type="text" name="surname" class="form-control {{ $errors->has("surname") ? 'is-invalid' : '' }}" id="surname" placeholder="Surname" value="{{ old('surname', $user->surname ?? '') }}" {{ isset($user) ? 'disabled' : '' }}>
        @include('admin._partials._error', [ 'column' => "surname" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="email" class="form-label">E-mail</label>
        <input type="text" name="email" class="form-control {{ $errors->has("email") ? 'is-invalid' : '' }}" id="email" placeholder="E-mail" value="{{ old('email', $user->email ?? '') }}" {{ isset($user) ? 'disabled' : '' }}>
        @include('admin._partials._error', [ 'column' => "email" ])
    </div>

    <div class="col-sm-6">
        <label for="password" class="form-label">Password</label>
        <input type="text" name="password" class="form-control {{ $errors->has("password") ? 'is-invalid' : '' }}" id="password" placeholder="••••••••" {{ isset($user) ? 'disabled' : '' }}>
        @include('admin._partials._error', [ 'column' => "password" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="role" class="form-label">Role</label>
        <select name="role" class="form-control {{ $errors->has("role") ? 'is-invalid' : '' }}" id="role">
            <option value>Select role</option>
            @foreach( config('settings.format') as $role => $name )
                <option value="{{ $role }}" {{ old('role', $user->role ?? '') == $role ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        @include('admin._partials._error', [ 'column' => "role" ])
    </div>
</div>

<div class="row mt-3 mb-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>
