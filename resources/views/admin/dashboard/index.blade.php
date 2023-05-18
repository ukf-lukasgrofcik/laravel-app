@extends('layout.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div id="chart-suppliers-with-most-orders">
                    @foreach($suppliers_with_most_orders as $supplier)
                        <div data-label="{{ $supplier->label }}" data-amount="{{ $supplier->amount }}"></div>
                    @endforeach
                </div>
            </div>

            <div class="col-sm-6">
                <div id="chart-suppliers-with-most-profit">
                    @foreach($suppliers_with_most_profit as $supplier)
                        <div data-label="{{ $supplier->label }}" data-amount="{{ $supplier->amount }}"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
