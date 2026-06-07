@extends('layouts.app')

@section('content')
@if(session('success'))

<div class="success-message">
    {{ session('success') }}
</div>

@endif

<div class="search-section">

    <form action="/search" method="GET" class="search-form">

        <input 
            type="text" 
            name="search" 
            placeholder="Search products..."
            required
        >

        <button type="submit">
            
            Search
        </button>

        
        <a href="/cart" class="cart-page">
            Cart
        </a>
    </form>

</div>
<div class="category-section">
    
    @foreach($categories as $category)
    <span class="category-box">

        <a 
            href="/category/{{ $category }}"
            class="category-btn"
        >
            {{ $category }}
        </a>

    </span>
    @endforeach
</div>


<div class="user-nav">
@if(session('user_id'))

    <span class="user-name">
        Welcome, {{ session('user_name') }}
    </span>

    <a href="/logout" class="login-btn">
        Logout
    </a>

@else

    <a href="/login" class="login-btn">
        Login
    </a>

@endif
</div>
<!-- Top Selling SECTION -->

<section class="looking-section">
    
    <div class="section-header">
        <h2>Top Selling and trending from last 2 months</h2>
    </div>

    <div class="product-scroll">

    @foreach($products as $product)

        <a href="/product/{{ $product['id'] }}" class="product-card">

            <img src="{{ asset('storage/' . $product->image) }}" alt="">

            <p>{{ $product->name }}</p>

        </a>

    @endforeach

    <!-- Duplicate Products For Infinite Loop -->

    @foreach($products as $product)

        <a href="/product/{{ $product['id'] }}" class="product-card">

            <img src="{{ asset('storage/' . $product->image) }}" alt="">

            <p>{{ $product->name }}</p>

        </a>

    @endforeach



    </div>
<br>
</section>


<!-- Latest Products Section -->

<h2 class="heading">Latest Products</h2>

<div class="products">

    @foreach($products as $product)

    <div class="card">
        <img src="{{ asset('storage/' . $product->image) }}">
        {{-- <!-- <img src="{{ $product['image'] }}" alt=""> --> --}}

        <h3>{{ $product['name'] }}</h3>

        <p class="category">{{ $product['category'] }}</p>

        <h4>₹{{ $product['price'] }}</h4>

        <div class="buttons">
            <a href="/product/{{ $product['id'] }}" class="view-btn">View</a>

            <a href="/add-to-cart/{{ $product['id'] }}" class="cart-btn">
                Add To Cart
            </a>
        </div>

    </div>

    @endforeach

</div>


<!-- offer section -->

<a href="/offers" class="offers-link">

<section class="fashion-deals-section">

    <div class="fashion-deals-header">

        <h2>Best Value Deals on Fashion</h2>

        <div class="fashion-arrow-btn">
            →
        </div>

    </div>

    <div class="fashion-products-row">

        <div class="fashion-product-card">
            <img src="{{ asset('storage/slippers.jpg') }}" alt="">
            <p>Men’s Slippers & Flip Flops</p>
            <h4>Min. 70% Off</h4>
        </div>

        <div class="fashion-product-card">
            <img src="{{ asset('storage/NIvashoes .jpg') }}" alt="">
            <p>Men’s Casual Shoes</p>
            <h4>Min. 70% Off</h4>
        </div>

        <div class="fashion-product-card">
            <img src="{{ asset('storage/wallet.jpg') }}" alt="">
            <p>Wallets</p>
            <h4>Min. 70% Off</h4>
        </div>

        <div class="fashion-product-card">
            <img src="{{ asset('storage/suitcase.jpg') }}" alt="">
            <p>Suitcases</p>
            <h4>Min. 70% Off</h4>
        </div>

    </div>

</section>

</a>


<a href="/offers" class="spotlight-link">

<!-- SPOTLIGHT SECTION -->

<section class="spotlight-main-section">

    <h2 class="spotlight-main-heading">
        In The Spotlight
    </h2>

    <div class="spotlight-grid-box">

        <div class="spotlight-ad-card">
             <img src="{{ asset('storage/Spotlight1.jpg') }}" alt="">
        </div>

        <div class="spotlight-ad-card">
             <img src="{{ asset('storage/Spotlight2.jpg') }}" alt="">
        </div>

        <div class="spotlight-ad-card">
             <img src="{{ asset('storage/Spotlight3.jpg') }}" alt="">
        </div>

        <div class="spotlight-ad-card">
             <img src="{{ asset('storage/Spotlight4.jpg') }}" alt="">
        </div>

        <div class="spotlight-ad-card">
             <img src="{{ asset('storage/Spotlight5.jpg') }}" alt="">
        </div>

    </div>

</section>

</a>

@endsection