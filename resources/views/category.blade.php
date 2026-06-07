@extends('layouts.app')

@section('content')

<h2 class="heading">
    {{ ucfirst($category) }} Products
</h2>

<div class="category-section">

    @foreach($products->pluck('category')->unique() as $cat)

        <a href="/category/{{ $cat }}" class="category-box">
            {{ $cat }}
        </a>

    @endforeach

</div>




@if(count($products) > 0)

<div class="products">

    @foreach($products as $product)

    <div class="card">

        <img src="{{ asset('storage/' . $product->image) }}">

        <h3>{{ $product['name'] }}</h3>

        <p class="category">{{ $product['category'] }}</p>

        <h4>₹{{ $product['price'] }}</h4>

        <div class="buttons">

            <a href="/product/{{ $product['id'] }}" class="view-btn">
                View
            </a>

            <a href="/add-to-cart/{{ $product['id'] }}" class="cart-btn">
                Add To Cart
            </a>

        </div>

    </div>

    @endforeach

</div>

@else

<h3>No Products Found</h3>

@endif

@endsection