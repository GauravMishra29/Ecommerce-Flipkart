@extends('layouts.admin')

@section('admin-content')

<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>

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

        form{
            max-width:500px;
            margin:auto;
            background:white;
            padding:25px;
            border-radius:8px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        h1{
            text-align:center;
            margin-bottom:20px;
            color:#2874f0;
        }

        input,
        textarea{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:5px;
            font-size:16px;
        }

        textarea{
            height:120px;
            resize:none;
        }

        button{
            width:100%;
            padding:12px;
            background:#2874f0;
            color:white;
            border:none;
            border-radius:5px;
            font-size:16px;
            cursor:pointer;
        }

        button:hover{
            background:#0f5bd3;
        }

        /* Responsive */

        @media(max-width:600px){

            form{
                padding:18px;
            }

            input,
            textarea,
            button{
                font-size:14px;
                padding:10px;
            }

            h1{
                font-size:24px;
            }
        }

    </style>

</head>

<body>

    <h1>Add Product</h1>

    @if ($errors->any())

        <div style="color:red;">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <input type="text" name="name" placeholder="Product Name">

        <br><br>

        <input type="text" name="category" placeholder="Category">


        <br><br>

        <textarea name="description" placeholder="Description"></textarea>

        <br><br>

        <input type="number" name="price" placeholder="Price">

        <br><br>

        <input type="file" name="image">

        <br><br>

        <button type="submit">
            Add Product
        </button>

    </form>

</body>

</html>
@stop