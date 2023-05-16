@extends('layout.admin')

@section('title', 'Tags')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('tags.index') }}" class="btn btn-primary">List of tags</a>
            </div>
        </div>

        <form action="{{ route('tags.store') }}" method="post">
            @include('admin.tags._partials._form')
        </form>
    </div>
@endsection
