@extends('layouts/app')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection
@section('content')
    <div class="container">
        <form action="{{route('carts.store', $product)}}" method="POST">
            @csrf
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1">
                                    <img src="{{route('image',['products',$product->image])}}" style="width: 70%"/>
                                </div>
                            </div>
                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">{{$product->seller->name}}</h3>
                            <h4 class="product-title">{{$product->name}}</h4>
                            <div class="rating">
                                <div class="stars">
                                    @for($i = 1; $i <= 5 ;$i++)
                                        @if($i <= $product->rating($product->id))
                                            <span class="fa fa-star star-active"></span>
                                        @else
                                            <span class="fa fa-star star-inactive"></span>
                                        @endif
                                    @endfor
                                </div>
                                <span class="review-no">{{$product->totalReviews($product->id)}} reviews</span>
                            </div>
                            <p class="product-description">{{$product->description}}</p>
                            <p class="product-stock">{{$product->stock}} Piece(s)</p>
                            <h4 class="price"><span style="color: black"> Rp. {{$product->price}}</span></h4>
                            <div class="action">
                                @can('create-cart',$product)
                                <button class="btn btn-outline-success my-2 my-sm-0" style="padding: 0.75rem" type="submit">
                                    Add to cart
                                </button>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @foreach($product->transactions as $transaction)
            @if(isset($transaction->review))
                <x-review
                    :review="$transaction->review"
                    :username="$transaction->user->username"
                    :image="$transaction->user->image">
                </x-review>
            @endif
        @endforeach
    </div>
@endsection
