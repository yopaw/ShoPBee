@extends('layouts/app')

@section('content')
    <div class="container">
        <h2>My Carts</h2>
        @foreach($carts as $cart)
            <div class="card" style="margin-bottom: 2rem">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem">
                        <h3 class="card-title">Transactions from {{$cart->seller->name}}</h3>
                        <a href="{{route('carts.show', $cart)}}">
                            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">See Cart Details</button>
                        </a>
                    </div>
                    <h4 class="card-title"></h4>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Total Product</th>
                            <th scope="col">Total Quantity</th>
                            <th scope="col">Grand Total Price</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$cart->products->count()}} Product(s)</td>
                                <td>{{$cart->getTotalQuantity($cart->id)}}</td>
                                <td>Rp. {{$cart->getTotalPrice($cart->id)}}</td>
                            </tr>
{{--                        <tr>--}}
{{--                            <td colspan="2"></td>--}}
{{--                            <td><strong>Total Price</strong></td>--}}
{{--                            <td>Rp. {{$transaction->getTotalPrice($transaction->id)}}</td>--}}
{{--                        </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection
