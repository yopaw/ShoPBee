<div class="card" style="width: 16.5rem; margin: 1rem">
    <img class="card-img-top" src="{{route('image',$product->image)}}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">{{$product->description}}</p>
        <a href="{{route('products.show', $product)}}" class="btn btn-outline-success my-2 my-sm-0">See Details</a>
    </div>
</div>
