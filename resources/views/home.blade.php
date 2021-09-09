@extends('layouts.master')

@section('content')
<div class="container">
    <h1 style="margin: 0 30px;">All Products</h1>
    <div class="col-md-12">
        <div class="row">
            @foreach($products as $product)
            <div class="card col-3" style="width: 18rem;margin: 30px; padding: 25px;">
                <img class="card-img-top productImage" src="{{ asset('storage/products/'.$product->image) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description}}</p>
                    <p class="card-text"><b> ₹ {{ $product->price}} </b></p>
                    <a href="{{ URL::to('add-product/'.$product->id) }}" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
