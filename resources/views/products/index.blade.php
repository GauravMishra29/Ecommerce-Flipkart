@extends('layouts.admin')

@section('admin-content')

<!DOCTYPE html>
<html>
<head>
    <title>All Products </title>
    
     <style>
       *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f1f3f6;
    padding:20px;
}

/* Header */

.heading-box{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
    gap:15px;
}

.heading-box h1{
    font-size:28px;
    color:#2874f0;
}

.heading-box a{
    text-decoration:none;
    color:white;
    background:red;
    padding:10px 18px;
    border-radius:6px;
    font-size:15px;
}

/* Add Product Button */

.add-btn{
    display:inline-block;
    margin-bottom:25px;
}

/* Product Grid */

.body-box{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(260px,1fr));
    gap:20px;
}

/* Product Card */

.product-box{
    background:white;
    border-radius:12px;
    padding:15px;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
    transition:0.3s;
}

.product-box:hover{
    transform:translateY(-5px);
}

.product-box img{
    width:100%;
    height:220px;
    object-fit:contain;
    border-radius:10px;
}

.product-box h2{
    margin-top:15px;
    font-size:22px;
    color:#222;
}

.product-box p{
    margin-top:8px;
    color:#666;
    font-size:15px;
}

.product-box h3{
    margin-top:10px;
    color:#2874f0;
    font-size:24px;
}

/* Buttons */

.btn{
    padding:10px 16px;
    text-decoration:none;
    border-radius:6px;
    color:white;
    display:inline-block;
    margin-top:15px;
    font-size:15px;
}

.view-btn{
    background:green;
}

.edit-btn{
    background:#2874f0;
}

/* Responsive */

@media(max-width:768px){

    body{
        padding:15px;
    }

    .heading-box{
        flex-direction:column;
        align-items:flex-start;
    }

    .heading-box h1{
        font-size:24px;
    }

    .product-box h2{
        font-size:20px;
    }

    .product-box h3{
        font-size:22px;
    }
}

@media(max-width:480px){

    .body-box{
        grid-template-columns:1fr;
    }

    .product-box{
        padding:12px;
    }

    .product-box img{
        height:200px;
    }

    .btn{
        width:100%;
        text-align:center;
    }
}

    </style> 

</head>
<body>

<!-- <h1>All Products </h1> -->
<div class="heading-box">
    <h1>All Products</h1>
    <h1><a href="/admin/logout">
    Logout
</a></h1>
</div>

<!-- this code will show a add product button in the admin dashboard page above the products -->

<!-- <a href="{{ route('products.create') }}" class="btn edit-btn">
    + Add Product
</a> -->

<br>
<div class="body-box">

@foreach($products as $product)

<div class="product-box">

    <img src="{{ asset('storage/' . $product->image) }}" alt="">

    <h2>{{ $product->name }}</h2>

    <p>{{ $product->category }}</p>

    <h3>₹{{ $product->price }}</h3>

    <a 
        href="{{ route('products.show', $product->id) }}"
        class="btn view-btn"
    >
        View
    </a>

    <a 
        href="{{ route('products.edit', $product->id) }}"
        class="btn edit-btn"
    >
        Edit
    </a>

</div>

@endforeach
</div>
</body>
</html>
@stop