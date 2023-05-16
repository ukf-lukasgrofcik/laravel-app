@extends('layout.admin')

@section('title', 'Tags')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('tags.index') }}" class="btn btn-primary">List of tags</a>
            </div>
        </div>

        @include('admin._partials._alert')

        <form action="{{ route('tags.update', $tag) }}" method="post">
            @method('PUT')
            @include('admin.tags._partials._form')
        </form>
    </div>
@endsection
