@extends('layouts/app')
@section('links')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
@endsection

@section('script')
    $(document).ready(function() {

    /* Set rates */
    var taxRate = 0.05;
    var fadeTime = 300;

    /* Assign actions */
    $('.pass-quantity input').change(function() {
    updateQuantity(this);
    });

    $('.remove-item button').click(function() {
    removeItem(this);
    });


    /* Recalculate cart */
    function recalculateCart() {
    var subtotal = 0;

    /* Sum up row totals */
    $('.item').each(function() {
    subtotal += parseFloat($(this).children('.product-line-price').text());
    });

    /* Calculate totals */
    var tax = subtotal * taxRate;
    var total = subtotal + tax;

    /* Update totals display */
    $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('.cart-total').html(total.toFixed(2));
    if (total == 0) {
    $('.checkout').fadeOut(fadeTime);
    } else {
    $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
    });
    }


    /* Update quantity */
    function updateQuantity(quantityInput) {
    /* Calculate line price */
    var productRow = $(quantityInput).parent().parent();
    var price = parseFloat(productRow.children('.product-price').text());
    var quantity = $(quantityInput).val();
    var linePrice = price * quantity;

    /* Update line price display and recalc cart totals */
    productRow.children('.product-line-price').each(function() {
    $(this).fadeOut(fadeTime, function() {
    $(this).text(linePrice.toFixed(2));
    recalculateCart();
    $(this).fadeIn(fadeTime);
    });
    });
    }

    /* Remove item from cart */
    function removeItem(removeButton) {
    /* Remove row from DOM and recalc cart total */
    var productRow = $(removeButton).parent().parent();
    productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
    });
    }

    });
@endsection
@section('content')
       <div class="container mt-5 mb-5 card" style="padding: 1rem;">
           <div class="row justify-content-center">
               <div class="col-xl-12 col-lg-11 col-md-10">
                   <div class="">
                       <h2 class="text-uppercase">My Carts</h2>
                   </div>
                   <div class="border border-gainsboro p-3">
                       <h2 class="h6 text-uppercase mb-0">Cart Total ({{$cart->products->count()}} Items): <strong class="cart-total">Rp. {{$cart->getTotalPrice($cart->id)}}</strong></h2>
                   </div>
                  @foreach($cart->products as $product)
                       <div class="border border-gainsboro p-3 mt-3 clearfix item">
                           <div class="text-lg-left">
                               <img width="100px" src="{{route('image',['products',$product->image])}}" alt="">
                           </div>
                           <div class="col-lg-5 col-5 text-lg-left">
                               <h3 class="h6 mb-0">{{$product->name}}<br>
                                   <small>Cost: Rp.{{$product->price}}</small>
                               </h3>
                           </div>
                           <div class="product-price d-none">50</div>
                           <div class="pass-quantity col-lg-3 col-md-4 col-sm-3">
                               <label for="pass-quantity" class="pass-quantity">Quantity</label>
                               <input disabled class="form-control" type="number" value="{{$product->pivot->quantity}}" min="1">
                           </div>
                           <div class="col-lg-2 col-md-1 col-sm-2 product-line-price pt-4">
                            <span class="product-line-price">Rp.{{$product->price}}
                        </span>
                           </div>
                           <div class="remove-item pt-4">
                               <form action="{{route('carts.destroy',[$cart,$product])}}" method="POST">
                                   @method('DELETE')
                                   @csrf
                                   <button class="btn btn-outline-danger my-2 my-sm-0"
                                           type="submit">Delete</button>
                                   </button>
                               </form>
                           </div>
                       </div>
                   @endforeach
                   <form action="{{route('transactions.store',$cart)}}" method="POST">
                   <div class="form-group"  style="margin-top: 1rem">
                       <h2>Voucher</h2>
                       <select class="form-control" id="voucher" name="voucher">
                           @foreach($vouchers as $voucher)
                               <option value="{{$voucher->name}}">{{$voucher->name}}</option>
                           @endforeach
                       </select>
                   </div>
                       {{$errors->first()}}
                   @error('voucher')<div class="text-danger">{{$message}}</div>@enderror
                       @csrf
                       <div>
                           <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Checkout</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
@endsection
