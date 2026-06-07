@extends('layouts.admin')

@section('admin-content')
<!DOCTYPE html>
<html>
    <head>

    <title>Add Offer</title>

    <style>

        body{
            font-family:Arial;
            background:#f1f3f6;
            padding:20px;
        }

        .form-box{
            width:400px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:10px;
        }

        input{
            width:100%;
            padding:12px;
            margin-bottom:15px;
        }

        button{
            background:#2874f0;
            color:white;
            border:none;
            padding:12px;
            width:100%;
            cursor:pointer;
        }

    </style>

</head>
<body>

<div class="form-box">

    <h2>Add New Offer</h2>

    <form action="{{ route('offers.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <input type="text"
               name="name"
               placeholder="Product Name">

        <input type="text"
               name="offer"
               placeholder="Offer">

        <input type="file"
               name="image">

        <button type="submit">
            Add Offer
        </button>

    </form>

</div>

</body>
</html>
@stop