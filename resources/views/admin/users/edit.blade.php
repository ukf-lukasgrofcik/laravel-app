@extends('layout.admin')

@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('users.index') }}" class="btn btn-primary">List of users</a>
            </div>
        </div>

        <form action="{{ route('users.update', $user) }}" method="post">
            @method('PUT')
            @include('admin.users._partials._form')
        </form>
    </div>
@endsection
