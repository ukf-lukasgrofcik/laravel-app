@extends('layout.admin')

@section('title', 'Change password')

@section('content')
    <div class="container">

        @include('admin._partials._alert')

        <form action="{{ route('settings.password.submit') }}" method="post">
            @include('admin.settings._partials._form_password')
        </form>
    </div>
@endsection
