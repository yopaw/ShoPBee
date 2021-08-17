@extends('layouts/app')

@section('content')
   <div class="card" style="margin: 2rem">
       <h1 style="margin: 2rem">Insert Product</h1>
       <form action="{{route('products.store')}}" style="margin: 2rem" method="POST" enctype="multipart/form-data">
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
           </div>
           <div class="col-sm-3">
               <div class="w-100 my-3">
                   <img src="" alt="" class="img-fluid img-thumbnail" id="product-image">
               </div>
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
       </form>
   </div>
@endsection
