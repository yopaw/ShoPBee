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
                            <div class="tab-pane active" id="pic-1"><img src="http://placekitten.com/400/252"/></div>
                            <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252"/></div>
                            <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252"/></div>
                            <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252"/></div>
                            <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252"/></div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img
                                        src="http://placekitten.com/200/126"/></a></li>
                            <li><a data-target="#pic-2" data-toggle="tab"><img
                                        src="http://placekitten.com/200/126"/></a></li>
                            <li><a data-target="#pic-3" data-toggle="tab"><img
                                        src="http://placekitten.com/200/126"/></a></li>
                            <li><a data-target="#pic-4" data-toggle="tab"><img
                                        src="http://placekitten.com/200/126"/></a></li>
                            <li><a data-target="#pic-5" data-toggle="tab"><img
                                        src="http://placekitten.com/200/126"/></a></li>
                        </ul>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">men's shoes fashion</h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>
                        <p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium
                            cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                        <h4 class="price">current price: <span>$180</span></h4>
                        <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong>
                        </p>
                        <h5 class="sizes">sizes:
                            <span class="size" data-toggle="tooltip" title="small">s</span>
                            <span class="size" data-toggle="tooltip" title="medium">m</span>
                            <span class="size" data-toggle="tooltip" title="large">l</span>
                            <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                        </h5>
                        <h5 class="colors">colors:
                            <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                            <span class="color green"></span>
                            <span class="color blue"></span>
                        </h5>
                        <div class="action">
                            <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($product->transactions as $transaction)
            @if(isset($transaction->review))
                <x-review
                    :content="$transaction->review->content"
                    :username="$transaction->user->username"
                    :rating="$transaction->review->rating"
                    :date="$transaction->review->date">
                </x-review>
            @endif
        @endforeach
    </div>
@endsection
