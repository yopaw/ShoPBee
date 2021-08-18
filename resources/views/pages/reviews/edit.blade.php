@extends('layouts/app')

@section('content')
    <div class="card" style="margin: 2rem">
        <h1 style="margin: 2rem">Update Review</h1>
        <form action="{{route('reviews.update', $review)}}" style="margin: 2rem" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <h3>Shop Name</h3>
                <h3>{{$review->transaction->seller->name}}</h3>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" rows="3" name="content">{{$review->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" value="{{$review->rating}}" class="form-control" id="rating" name="rating" min="1" max="5" placeholder="rating">
            </div>
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Submit</button>
        </form>
    </div>
@endsection

