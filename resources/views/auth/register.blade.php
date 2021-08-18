@extends('layouts.app')

@section('content')
    <div class="card w-50 mx-auto my-5">
        <div class="card-body">
            <h3 class="card-title">Register</h3>
            <hr class="bg-blue">
            <form action="{{route('register.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    @error('email') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    @error('username') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    @error('password') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                <div class="form-group">
                    <label for="money">Money</label>
                    <input type="number" class="form-control" id="money" name="money" placeholder="Money">
                    @error('money') <div class="text-danger">{{$message}}</div> @enderror
                </div>
                <label for="image">Profile Image</label>
                <div class="custom-file" style="margin-bottom: 1rem">
                    <input type="file" class="custom-file-input" id="image" name="image"
                           onchange="let file = event.target.files[0];
                                    if (!file.type.match('image.*')) return;
                                    let reader = new FileReader();
                                    reader.onload = (function() {
                                        return function(e) {
                                            document.getElementById('product-image').src = e.target.result;
                                        };
                                    })(file);
                                    reader.readAsDataURL(file);">
                    <label class="custom-file-label" for="image">Choose file...</label>
                    @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col-sm-3">
                    <div class="w-100 my-3">
                        <img src="" alt="" class="img-fluid img-thumbnail" id="product-image">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Register</button>
            </form>
        </div>
    </div>
@endsection
