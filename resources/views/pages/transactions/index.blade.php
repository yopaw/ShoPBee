@extends('layouts/app')

@section('content')
    <div class="container">
        <h2>My Transaction History</h2>
        @foreach($transactions as $transaction)
            <div class="card" style="margin-bottom: 2rem">
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 1rem">
                        @if($type == 'buyer')
                            <h3 class="card-title">Transactions from {{$transaction->seller->name}}</h3>
                        @else
                            <h3 class="card-title">Transactions from {{$transaction->user->username}}</h3>
                        @endif
                            @can('create-review', $transaction)
                                <a href="{{route('reviews.create',$transaction)}}">
                                    <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Leave a Review
                                    </button>
                                </a>
                            @endcan
                    </div>
                    <h4 class="card-title">Transaction Date: {{$transaction->date}}</h4>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transaction->products()->withTrashed()->get() as $product)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$product->name}}</td>
                                <td>Rp. {{$product->price}}</td>
                                <td>{{$product->pivot->quantity}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"></td>
                            <td><strong>Total Price</strong></td>
                            <td>Rp. {{$transaction->getTotalPrice($transaction->id)}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection
