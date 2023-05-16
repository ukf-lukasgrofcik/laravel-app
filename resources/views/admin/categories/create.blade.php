@extends('layout.admin')

@section('title', 'Categories')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('categories.index') }}" class="btn btn-primary">List of categories</a>
            </div>
        </div>

        <form action="{{ route('categories.store') }}" method="post">
            @include('admin.categories._partials._form')
        </form>
    </div>
@endsection
