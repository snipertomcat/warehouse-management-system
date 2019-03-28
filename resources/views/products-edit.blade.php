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
                <div class="panel-heading">Edit product</div>

                <div class="panel-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name">Name* </label>
                            <input class="form-control" type="text" name="name" value="{{$product->name}}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Price* </label>
                            <input class="form-control" type="number" name="price" value="{{$product->price}}" required>
                        </div>

                        <div class="form-group">
                            <label for="name">Description* </label>
                            <input class="form-control" type="text" name="description" value="{{$product->description}}" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection 