@extends('layout.admin')

@section('title', 'Articles')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('articles.create') }}" class="btn btn-primary">New article</a>
            </div>
        </div>

        @include('admin._partials._alert')

        <div class="row mt-3">
            <div class="col-sm-12">
                @include('admin.articles._partials._table')
            </div>
        </div>
    </div>
@endsection
