@extends('layout.admin')

@section('title', 'Suppliers')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('suppliers.index') }}" class="btn btn-primary">List of suppliers</a>
            </div>
        </div>

        <form action="{{ route('suppliers.store') }}" method="post">
            @include('admin.suppliers._partials._form')
        </form>
    </div>
@endsection
