@extends('layout.admin')

@section('title', 'Tags')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('tags.create') }}" class="btn btn-primary">New tag</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12">
                @include('admin.tags._partials._table')
            </div>
        </div>
    </div>
@endsection
