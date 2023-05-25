@extends('layout.admin')

@section('title', 'Invoices')

@section('content')
    <div class="container">
        @include('admin._partials._alert')

        <div class="row mt-3">
            <div class="col-sm-12">
                @include('admin.invoices._partials._table')
            </div>
        </div>
    </div>
@endsection
