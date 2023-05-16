@extends('layout.admin')

@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('users.create') }}" class="btn btn-primary">New user</a>
            </div>
        </div>

        @include('admin._partials._alert')

        <div class="row mt-3">
            <div class="col-sm-12">
                @include('admin.users._partials._table')
            </div>
        </div>
    </div>
@endsection
