<style>
    .product-page{
    display: flex;
    gap: 40px;
    padding: 40px;
    max-width: 1200px;
    margin: auto;
    align-items: flex-start;
    flex-wrap: wrap;
}

.product-page img{
    width: 100%;
    max-width: 450px;
    height: auto;
    object-fit: cover;
    border-radius: 10px;
    border: 1px solid #ddd;
    background: #fff;
}

.details{
    flex: 1;
    min-width: 300px;
}

.details h1{
    font-size: 32px;
    margin-bottom: 15px;
    color: #222;
}

.details p{
    font-size: 16px;
    line-height: 1.7;
    color: #555;
    margin-bottom: 20px;
}

.details h2{
    font-size: 30px;
    color: #2874f0;
    margin-bottom: 25px;
}

.details a{
    display: inline-block;
    text-decoration: none;
    background: #2874f0;
    color: white;
    padding: 12px 22px;
    border-radius: 6px;
    margin-right: 10px;
    transition: 0.3s;
}

.details a:hover{
    background: #0d5be1;
}

.details form{
    display: inline-block;
}

.details button{
    border: none;
    background: #e53935;
    color: white;
    padding: 12px 22px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
}

.details button:hover{
    background: #c62828;
}

/* Tablet */

@media(max-width:992px){

    .product-page{
        gap: 25px;
        padding: 25px;
    }

    .details h1{
        font-size: 28px;
    }

    .details h2{
        font-size: 26px;
    }

}

/* Mobile */

@media(max-width:768px){

    .product-page{
        flex-direction: column;
        padding: 20px;
    }

    .product-page img{
        max-width: 100%;
    }

    .details{
        width: 100%;
    }

    .details h1{
        font-size: 24px;
    }

    .details p{
        font-size: 15px;
    }

    .details h2{
        font-size: 24px;
    }

    .details a,
    .details button{
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
    }

    .details form{
        display: block;
        width: 100%;
    }

}
</style>

<div class="product-page">

    <img src="{{ asset('storage/' . $product->image) }}" alt="">

    <div class="details">

        <h1>{{ $product->name }}</h1>

        <p>{{ $product->description }}</p>

        <h2>₹{{ $product->price }}</h2>

        <a href="{{ route('products.edit', $product->id) }}">
    Edit
</a>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

    </div>

</div>