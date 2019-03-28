@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <ul>
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li><a href="/sales">Sales</a></li>
                        <li><a href="/deliveries">Deliveries</a></li>
                        <li><a href="/stock">Stock Management</a></li>
                        <li><a href="/products">Products</a></li>
                        <li><a href="/settings">Settings</a></li>
                        <ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h4>{{ $products_data }}</h4>
                            <h5>Total products</h5>
                        </div>
                        <div class="col-md-6 text-center">
                            <h4>{{ $sales_data }}</h4>
                            <h5>Total sales</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h4>{{ $deliveries_data }}</h4>
                            <h5>Total deliveries</h5>
                        </div>
                        <div class="col-md-6 text-center">
                            <h4>{{ $stock_data }}</h4>
                            <h5>Total SKUs</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 