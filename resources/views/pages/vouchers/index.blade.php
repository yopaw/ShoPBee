@extends('layouts/app')

@section('content')
    <div class="container">
        <h2>Vouchers</h2>
        @foreach($vouchers as $voucher)
            <div class="card" style="margin-bottom: 2rem">
                <div class="card-body">
                    <h3 class="card-title">{{$voucher->name}}</h3>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Seller Name</th>
                            <th scope="col">Used</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($voucher->sellers as $seller)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$seller->name}}</td>
                                <td>{{$seller->getTotalVoucherUsed($voucher->id)}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td>Total Used</td>
{{--                            @dd($voucher->transactions)--}}
                            <td>{{$voucher->transactions->count()}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection
