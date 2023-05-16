@extends('layout.admin')

@section('title', 'Articles')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('articles.index') }}" class="btn btn-primary">List of articles</a>
            </div>
        </div>

        <form action="{{ route('articles.store') }}" method="post">
            @include('admin.articles._partials._form')
        </form>
    </div>
@endsection
