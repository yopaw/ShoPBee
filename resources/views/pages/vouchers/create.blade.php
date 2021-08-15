@extends('layouts/app')

@section('content')
    <div class="card" style="margin: 2rem">
        <h1 style="margin: 2rem">Insert Voucher</h1>
        <form action="{{route('products.store')}}" style="margin: 2rem" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Voucher Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Voucher Name">
            </div>
            <div class="form-group">
                <label for="sel1">Seller list:</label>
                <select multiple class="form-control" id="sel1">
                    @foreach($sellers as $seller)
                        <option value="{{$seller->name}}">{{$seller->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Voucher Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Voucher Stock">
            </div>
            <div class="form-group">
                <label for="description">Voucher Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="stock">Voucher Discount</label>
                <input type="number" class="form-control" id="discount" name="discount" min="35" max="60" placeholder="Voucher Discount">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="minimum">Voucher Minimum Price</label>
                    <input type="number" class="form-control" id="minimum" min="35000" max="60000" placeholder="Voucher Minimum Price">
                </div>
                <div class="form-group col-md-6">
                    <label for="maximum">Voucher Maximum Price</label>
                    <input type="number" class="form-control" id="maximum" min="50000" max="100000" placeholder="Voucher Maximum Price">
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Submit</button>
        </form>
    </div>
@endsection

