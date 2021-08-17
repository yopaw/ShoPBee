@extends('layouts/app')
@section('css')

    .rating-box {
    width: 130px;
    height: 130px;
    margin-right: auto;
    margin-left: auto;
    background-color: #FBC02D;
    color: #fff
    }

    .rating-label {
    font-weight: bold
    }

    .rating-bar {
    width: 300px;
    padding: 8px;
    border-radius: 5px
    }

    .bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
    border-radius: 20px;
    cursor: pointer;
    margin-bottom: 5px
    }

    .bar-5 {
    width: 70%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
    }

    .bar-4 {
    width: 30%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
    }

    .bar-3 {
    width: 20%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
    }

    .bar-2 {
    width: 10%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
    }

    .bar-1 {
    width: 0%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
    }

    td {
    padding-bottom: 10px
    }

    .star-active {
    color: #FBC02D;
    margin-top: 10px;
    margin-bottom: 10px
    }

    .star-active:hover {
    color: #F9A825;
    cursor: pointer
    }

    .star-inactive {
    color: #CFD8DC;
    margin-top: 10px;
    margin-bottom: 10px
    }

    .blue-text {
    color: #0091EA
    }

    .content {
        font-size: 18px
    }

    .profile-pic {
    width: 90px;
    height: 90px;
    border-radius: 100%;
    margin-right: 30px
    }

    .pic {
    width: 80px;
    height: 80px;
    margin-right: 10px
    }

    .vote {
    cursor: pointer
    }

    img {
    max-width: 100%; }

    .preview {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column; }
    @media screen and (max-width: 996px) {
    .preview {
    margin-bottom: 20px; } }

    .preview-pic {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1; }

    .preview-thumbnail.nav-tabs {
    border: none;
    margin-top: 15px; }
    .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
    max-width: 100%;
    display: block; }
    .preview-thumbnail.nav-tabs li a {
    padding: 0;
    margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
    margin-right: 0; }

    .tab-content {
    overflow: hidden; }
    .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
    animation-name: opacity;
    -webkit-animation-duration: .3s;
    animation-duration: .3s; }

    .card {
    padding: 3em;
    line-height: 1.5em; }

    @media screen and (min-width: 997px) {
    .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

    .details {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column; }

    .colors {
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    -ms-flex-positive: 1;
    flex-grow: 1; }

    .product-title, .price, .sizes, .colors {
    text-transform: UPPERCASE;
    font-weight: bold; }

    .checked, .price span {
    color: #ff9f1a; }

    .product-title, .rating, .product-description, .price, .vote, .sizes {
    margin-bottom: 15px; }

    .product-title {
    margin-top: 0; }

    .size {
    margin-right: 10px; }
    .size:first-of-type {
    margin-left: 40px; }

    .color {
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px;
    height: 2em;
    width: 2em;
    border-radius: 2px; }
    .color:first-of-type {
    margin-left: 20px; }

    .add-to-cart, .like {
    background: #ff9f1a;
    padding: 1.2em 1.5em;
    border: none;
    text-transform: UPPERCASE;
    font-weight: bold;
    color: #fff;
    -webkit-transition: background .3s ease;
    transition: background .3s ease; }
    .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

    .not-available {
    text-align: center;
    line-height: 2em; }
    .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

    .orange {
    background: #ff9f1a; }

    .green {
    background: #85ad00; }

    .blue {
    background: #0076ad; }

    .tooltip-inner {
    padding: 1.3em; }

    @-webkit-keyframes opacity {
    0% {
    opacity: 0;
    -webkit-transform: scale(3);
    transform: scale(3); }
    100% {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1); } }

    @keyframes opacity {
    0% {
    opacity: 0;
    -webkit-transform: scale(3);
    transform: scale(3); }
    100% {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1); }}
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                <img src="{{route('image',$product->image)}}" style="width: 70%"/>
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
                        <h4 class="price"><span style="color: black"> Rp. {{$product->price}}</span></h4>
                        <div class="action">
                            <button class="btn btn-outline-success my-2 my-sm-0" style="padding: 0.75rem" type="button">Add to cart</button>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($product->transactions as $transaction)
            @if(isset($transaction->review))
                <x-review
                    :review="$transaction->review"
                    :username="$transaction->user->username">
                </x-review>
            @endif
        @endforeach
    </div>
@endsection
