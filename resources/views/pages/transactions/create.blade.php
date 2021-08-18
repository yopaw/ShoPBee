@extends('layouts/app')

@section('content')
    <div class="col-xl-3 col-lg-4 col-md-5 totals">
        <div class="border border-gainsboro px-3">
            <div class="border-bottom border-gainsboro">
                <p class="text-uppercase mb-0 py-3"><strong>Order Summary</strong></p>
            </div>
            <div class="totals-item d-flex align-items-center justify-content-between mt-3">
                <p class="text-uppercase">Subtotal</p>
                <p class="totals-value" id="cart-subtotal">95</p>
            </div>
            <div class="totals-item d-flex align-items-center justify-content-between">
                <p class="text-uppercase">Estimated Tax</p>
                <p class="totals-value" id="cart-tax">3.60</p>
            </div>
            <div class="totals-item totals-item-total d-flex align-items-center justify-content-between mt-3 pt-3 border-top border-gainsboro">
                <p class="text-uppercase"><strong>Total</strong></p>
                <p class="totals-value font-weight-bold cart-total">98.60</p>
            </div>
        </div>
        <a href="#" class="mt-3 btn btn-pay w-100 d-flex justify-content-between btn-lg rounded-0">Pay Now <span class="totals-value cart-total">98.60</span></a>
    </div>
@endsection
