@extends('layout.admin')

@section('title', 'Orders')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('orders.index') }}" class="btn btn-primary">List of orders</a>
            </div>
        </div>

        @include('admin._partials._alert')

        <form action="{{ route('orders.update', $order) }}" method="post">
            @method('PUT')
            @include('admin.orders._partials._form')
        </form>
    </div>
@endsection
