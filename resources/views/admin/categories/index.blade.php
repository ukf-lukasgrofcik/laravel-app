@extends('layout.admin')

@section('title', 'Categories')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">New category</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-12">
                @include('admin.categories._partials._table')
            </div>
        </div>
    </div>
@endsection
