@extends('layouts/app')
@section('css')
    #outer-container{
        margin: 1rem;
        display: flex;
        flex-wrap: wrap;
    }
    .card
@endsection
@section('content')
    <div id="outer-container">
        @foreach($products as $product)
        @component('components/card')
        @endcomponent
        @endforeach
    </div>
@endsection
