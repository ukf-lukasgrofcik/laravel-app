@extends('layout.admin')

@section('title', 'Profile')

@section('content')
    <div class="container">

        @include('admin._partials._alert')

        <form action="{{ route('settings.profile.submit') }}" method="post">
            @include('admin.settings._partials._form_profile')
        </form>
    </div>
@endsection
