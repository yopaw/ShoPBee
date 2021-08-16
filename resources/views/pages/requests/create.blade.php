@extends('layouts/app')

@section('content')
    <div class="card" style="margin: 2rem">
        <h1 style="margin: 2rem">Apply Request</h1>
        <form action="{{route('requests.store', $user)}}" style="margin: 2rem" method="POST">
            @csrf
            <div class="form-group">
                <label for="seller_name">Shop Name</label>
                <input type="text" class="form-control" id="seller_name" name="seller_name" placeholder="Shop Name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <input hidden type="text" class="form-control" id="status_id" name="status_id" value="1">
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Submit</button>
        </form>
    </div>
@endsection

