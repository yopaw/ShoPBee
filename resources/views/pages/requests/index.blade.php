@extends('layouts/app')

@section('content')
    <div class="container">
        <h2>Requests</h2>
            <div class="card" style="margin-bottom: 2rem">
                <div class="card-body">
{{--                    <h3 class="card-title">Transactions from {{$transaction->seller->name}}</h3>--}}
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Shop Name</th>
                            <th scope="col">Reason</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)

                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td>{{$request->user->username}}</td>
                                <td>{{$request->seller_name}}</td>
                                <td>{{$request->reason}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
