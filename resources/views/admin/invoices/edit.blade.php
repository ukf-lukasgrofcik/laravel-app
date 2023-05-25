@extends('layout.admin')

@section('title', 'Invoices')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('invoices.index') }}" class="btn btn-primary">List of invoices</a>
            </div>
        </div>

        @include('admin._partials._alert')

        <form action="{{ route('invoices.update', $invoice) }}" method="post">
            @method('PUT')
            @include('admin.invoices._partials._form')
        </form>
    </div>
@endsection
