@extends('layouts.app')

@section('content')

<h2 class="heading">My Cart</h2>

@if(count($cart) > 0)

<div class="products">

    @foreach($cart as $id => $item)

    <div class="card">
        
<img src="{{ asset('storage/' . $item['image']) }}">
        <h3>{{ $item['name'] }}</h3>

        <h4>₹{{ $item['price'] }}</h4>

         <!-- Quantity Buttons -->

        <div class="quantity-box">

            <a href="/decrease-cart/{{ $id }}" class="qty-btn">
                -
            </a>

            <span class="qty-number">
                {{ $item['quantity'] }}
            </span>

            <a href="/increase-cart/{{ $id }}" class="qty-btn">
                +
            </a>

        </div>

        <div class="buttons">

            <a href="/remove-from-cart/{{ $id }}" class="remove-btn">
                Remove
            </a>

        </div>

    </div>

    @endforeach

</div>

@php
    $total = 0;

    foreach($cart as $item){
        $total += $item['price'] * $item['quantity'];
    }
@endphp

<div class="checkout-section">

    <a href="/address" class="checkout-btn">
        Proceed To Checkout • ₹{{ $total }}
    </a>

</div>

@else

<h3>Cart is Empty</h3>

@endif

@endsection