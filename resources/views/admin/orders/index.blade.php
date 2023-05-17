@extends('layout.admin')

@section('title', 'Orders')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('orders.create') }}" class="btn btn-primary">New order</a>
            </div>
        </div>

        @include('admin._partials._alert')

        <div class="row mt-3">
            <div class="col-sm-12">
                @include('admin.orders._partials._table')
            </div>
        </div>
    </div>
@endsection
