@extends('layouts/app')

@section('content')
    <div class="card" style="margin: 2rem">
        <h1 style="margin: 2rem">Update Product</h1>
        <form action="{{route('products.update', $product)}}" style="margin: 2rem" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" value="{{$product->name}}" id="name" name="name" placeholder="Product Name">
                @error('name') <div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" value="{{$product->price}}" class="form-control" id="price" name="price" placeholder="Product Price">
                @error('price') <div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{$product->description}}</textarea>
                @error('description') <div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="stock">Product Stock</label>
                <input type="number" value="{{$product->stock}}" class="form-control" id="stock" name="stock" placeholder="Product Stock">
                @error('stock') <div class="text-danger">{{ $message }}</div>@enderror
            </div>

            <label for="image">Product Image</label>
            <div class="custom-file" style="margin-bottom: 1rem">
                <input type="file" class="custom-file-input" id="image" name="image"
                       onchange="let file = event.target.files[0];
                                    if (!file.type.match('image.*')) return;
                                    let reader = new FileReader();
                                    reader.onload = (function() {
                                        return function(e) {
                                            document.getElementById('product-image').src = e.target.result;
                                        };
                                    })(file);
                                    reader.readAsDataURL(file);">
                <label class="custom-file-label" for="image">Choose file...</label>
                @error('image') <div class="text-danger">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
                <div class="w-100 my-3">
                    <img src="{{route('image',['products',$product->image])}}" alt="" class="img-fluid img-thumbnail" id="product-image">
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Update</button>
        </form>
    </div>
@endsection
