@extends('layout.admin')

@section('title', 'Suppliers')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('suppliers.create') }}" class="btn btn-primary">New supplier</a>
            </div>
        </div>

        @include('admin._partials._alert')

        <div class="row mt-3">
            <div class="col-sm-12">
                @include('admin.suppliers._partials._table')
            </div>
        </div>
    </div>
@endsection
