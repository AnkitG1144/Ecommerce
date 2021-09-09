@extends('layouts.master')
@section('page-title')
    All orders
@endsection
@section('content')

<div class="card" style="margin-top: 50px;">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Payment Mode</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $key => $order)
                <tr>
                    <td><a href="{{ URL::to('orderDetails/'.json_encode($order->id))}}">{{ $order->order_id }}</a></td>
                    <td>{{ $order->first_name.' '.$order->last_name }}</td>
                    <td>@if($order->payment_mode) Cash on delivery @else N/A @endif</td>
                    <td>₹ {{ $order->total_amount }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection