@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Menu</div>

                <div class="panel-body">
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
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Add sale</div>

                <div class="panel-body">
                    <form action="{{ route('sales.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="product_id">Product ID* </label>
                            <input class="form-control" type="number" name="product_id" required>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity* </label>
                            <input class="form-control" type="number" name="quantity" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Sales list</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Product ID</td>
                                        <td>Quantity</td>
                                        <td>Created At</td>
                                        <td>Updated At</td>
                                        <td colspan=2>Actions</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales as $sale)
                                    <tr>
                                        <td>{{$sale->id}}</td>
                                        <td>{{$sale->product_id}}</td>
                                        <td>{{$sale->quantity}}</td>
                                        <td>{{$sale->created_at}}</td>
                                        <td>{{$sale->updated_at}}</td>
                                        <td>
                                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('sales.destroy', $sale->id)}}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 