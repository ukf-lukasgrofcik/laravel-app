@extends('layout.admin')

@section('title', 'Invoices')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('invoices.index') }}" class="btn btn-primary">List of invoices</a>
            </div>
        </div>

        <form action="{{ route('invoices.store') }}" method="post">
            @include('admin.invoices._partials._form')
        </form>
    </div>
@endsection
