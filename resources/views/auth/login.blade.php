@extends('layout.auth')

@section('title', 'Login')

@section('content')
    <div class="card shadow-lg mx-auto mt-5 w-25 border-0">
        <div class="card-body">
            <h5 class="card-title text-center">{{ env('APP_NAME') }}</h5>
            <h6 class="card-subtitle mb-2 text-muted text-center">Login</h6>

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="container">
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" name="email" class="form-control {{ $errors->has("email") ? 'is-invalid' : '' }}" id="email" placeholder="E-mail">
                            @include('auth._partials._error', [ 'column' => "email" ])
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control {{ $errors->has("password") ? 'is-invalid' : '' }}" id="password" placeholder="Password">
                            @include('auth._partials._error', [ 'column' => "password" ])
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
