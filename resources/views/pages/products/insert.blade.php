@extends('layouts/app')

@section('content')
    <h1 style="margin-left: 2rem">Insert Product</h1>
    <form action="{{route('products.store')}}" style="margin: 2rem" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
        </div>
        <div class="form-group">
            <label for="type">Product Type</label>
            <select class="form-control" id="type" name="type">
                @foreach($types as $type)
                    <option value="{{$type->name}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="price">Product Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Product Price">
        </div>
        <div class="form-group">
            <label for="description">Product Description</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="stock">Product Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" placeholder="Product Stock">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
