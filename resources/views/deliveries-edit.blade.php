@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Edit delivery</div>

                <div class="panel-body">
                    <form action="{{ route('deliveries.update', $delivery->id) }}" method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="sale_id">Sale ID* </label>
                            <input class="form-control" type="number" name="sale_id" value="{{$delivery->sale_id}}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Recipient* </label>
                            <input class="form-control" type="text" name="recipient" value="{{$delivery->recipient}}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address* </label>
                            <input class="form-control" type="text" name="address" value="{{$delivery->address}}" required>
                        </div>

                        <div class="form-group">
                            <label for="expected_arrival">Expected Arrival* </label>
                            <input class="form-control" type="date" name="expected_arrival" value="{{$delivery->expected_arrival}}" required>
                        </div>

                        <div class="form-group">
                            <label for="actual_arrival">Actual Arrival </label>
                            <input class="form-control" type="date" name="actual_arrival" value="{{$delivery->actual_arrival}}">
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
                            <input class="form-control" type="text" name="description" value="{{$delivery->description}}" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection 