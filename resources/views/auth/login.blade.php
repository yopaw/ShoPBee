@extends('layouts.app')

@section('content')
    <div class="card w-50 mx-auto my-5">
        <div class="card-body">
            <h3 class="card-title">Login</h3>
            <hr class="bg-blue">
            <form action="{{route('login.authenticate')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Login</button>
            </form>
        </div>
    </div>
@endsection
