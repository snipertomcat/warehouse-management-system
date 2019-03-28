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
                <div class="panel-heading">Add delivery</div>

                <div class="panel-body">
                    <form action="{{ route('deliveries.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="sale_id">Sale ID* </label>
                            <input class="form-control" type="number" name="sale_id" required>
                        </div>

                        <div class="form-group">
                            <label for="recipient">Recipient* </label>
                            <input class="form-control" type="text" name="recipient" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address* </label>
                            <input class="form-control" type="text" name="address" required>
                        </div>

                        <div class="form-group">
                            <label for="expected_arrival">Expected Arrival* </label>
                            <input class="form-control" type="date" name="expected_arrival" required>
                        </div>

                        <div class="form-group">
                            <label for="actual_arrival">Actual Arrival: </label>
                            <input class="form-control" type="date" name="actual_arrival">
                        </div>

                        <div class="form-group">
                            <label for="status">Delivery Status* </label>
                            <select class="form-control" name="status" required>
                                <option>processing</option>
                                <option>shipping</option>
                                <option>complete</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description* </label>
                            <input class="form-control" type="text" name="description" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        <div class="panel panel-default">
            <div class="panel-heading">Delivery list</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Sale ID</td>
                                    <td>Recipient</td>
                                    <td>Address</td>
                                    <td>Expected Arrival</td>
                                    <td>Actual Arrival</td>
                                    <td>Status</td>
                                    <td>Description</td>
                                    <td>Created At</td>
                                    <td>Updated At</td>
                                    <td colspan=2>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($deliveries as $delivery)
                                <tr>
                                    <td>{{$delivery->id}}</td>
                                    <td>{{$delivery->sale_id}}</td>
                                    <td>{{$delivery->recipient}}</td>
                                    <td>{{$delivery->address}}</td>
                                    <td>{{$delivery->expected_arrival}}</td>
                                    <td>{{$delivery->actual_arrival}}</td>
                                    <td>{{$delivery->status}}</td>
                                    <td>{{$delivery->description}}</td>
                                    <td>{{$delivery->created_at}}</td>
                                    <td>{{$delivery->updated_at}}</td>
                                    <td>
                                        <a href="{{ route('deliveries.edit', $delivery->id) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('deliveries.destroy', $delivery->id)}}" method="POST">
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