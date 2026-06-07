@extends('layouts.app')

@section('content')

<div class="product-page">

    <img src="{{ asset('storage/' . $product->image) }}">

    <div class="details">

        <h1>{{ $product['name'] }}</h1>

        <p>{{ $product['description'] }}</p>

        <h2>₹{{ $product['price'] }}</h2>

        


<!-- 🔥 PRODUCT HIGHLIGHTS -->
<div class="highlights">

    <h2>Product Highlights</h2>

    <ul>
        <li>✔ Premium Quality Material</li>
        <li>✔ 1 Year Warranty</li>
        <li>✔ Fast Delivery Available</li>
        <li>✔ Easy Return Policy</li>
    </ul>

</div>

<!-- ⭐ REVIEWS SECTION -->
<div class="reviews">

    <h2>Customer Reviews</h2>

    <!-- Review 1 -->
    <div class="review-card">
        <strong>Rahul Sharma</strong>
        <div class="stars">⭐⭐⭐⭐☆</div>
        <p>Very good product, worth the price!</p>
    </div>

    <!-- Review 2 -->
    <div class="review-card">
        <strong>Priya Verma</strong>
        <div class="stars">⭐⭐⭐⭐⭐</div>
        <p>Excellent quality and fast delivery 👍</p>
    </div>

</div>
<a href="/add-to-cart/{{ $product['id'] }}" class="cart-btn">
            Add To Cart
        </a>

    </div>
</div>
@endsection