@extends('layouts.master')

@section('content')
@if(count($orders))
<div class="row" style="margin: 20px;">
    <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">{{count($orders)}}</span>
        </h4>
        <ul class="list-group mb-3">
            @foreach($orders as $order)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                <h6 class="my-0">{{$order->name}}</h6>
                </div>
                <span class="text-muted">₹ {{ $order->price}}</span>
            </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (INR)</span>
                <strong>₹ {{$totalAmount->total_price}}</strong>
            </li>
        </ul>
    </div>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" action="{{ URL::to('checkout') }}" method="POST">@csrf
        <div class="row">
            <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
                Valid first name is required.
            </div>
            </div>
            <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required="">
            <div class="invalid-feedback">
                Valid last name is required.
            </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email"  name="email" placeholder="you@example.com">
            <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
            </div>
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required="">
            <div class="invalid-feedback">
            Please enter your shipping address.
            </div>
        </div>

        <div class="row">
            <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" name="country" required="">
                <option value="">Choose...</option>
                <option value="india">India</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid country.
            </div>
            </div>
            <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" name="state" required="">
                <option value="">Choose...</option>
                <option value="Bihar">Bihar</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Delhi">Delhi</option>
                <option value="Mumbai">Mumbai</option>
            </select>
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
            </div>
            <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip"  name="zip" placeholder="" required="">
            <div class="invalid-feedback">
                Zip code required.
            </div>
            </div>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
            <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
            <label class="custom-control-label" for="credit">Cash on delivery</label>
            </div>
        </div>
        <input type="hidden" name="total_price" value="{{ $totalAmount->total_price }}">
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
    </div>
</div>
@else
<div class="container">
    <h1 style="margin: 0 30px;">No product found ...</h1>
</div>
@endif
@endsection