
<style>
    form{
    width: 100%;
    max-width: 500px;
    margin: 40px auto;
    padding: 25px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);

    display: flex;
    flex-direction: column;
    gap: 18px;
}

form input,
form textarea{
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 15px;
    outline: none;
    box-sizing: border-box;
}

form textarea{
    resize: vertical;
    min-height: 120px;
}

form input:focus,
form textarea:focus{
    border-color: #2874f0;
}

form button{
    background: #2874f0;
    color: white;
    border: none;
    padding: 14px;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

form button:hover{
    background: #0d5be1;
}

/* Mobile Responsive */

@media(max-width:600px){

    form{
        width: 90%;
        padding: 18px;
    }

    form input,
    form textarea{
        font-size: 14px;
        padding: 10px;
    }

    form button{
        font-size: 15px;
        padding: 12px;
    }

}
</style>

<form 
    action="{{ route('products.update', $product->id) }}"
    method="POST"
    enctype="multipart/form-data"
>

    @csrf
    @method('PUT')

    <input 
        type="text"
        name="name"
        value="{{ $product->name }}"
    >

    <input 
        type="text"
        name="category"
        value="{{ $product->category }}"
    >

    <textarea name="description">
        {{ $product->description }}
    </textarea>

    <input 
        type="number"
        name="price"
        value="{{ $product->price }}"
    >

    <input type="file" name="image">

    <button type="submit">
        Update Product
    </button>

</form>