@extends('layout.admin')

@section('title', 'Orders')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <a href="{{ route('orders.index') }}" class="btn btn-primary">List of orders</a>
            </div>
        </div>

        <form action="{{ route('orders.store') }}" method="post">
            @include('admin.orders._partials._form')
        </form>
    </div>
@endsection
