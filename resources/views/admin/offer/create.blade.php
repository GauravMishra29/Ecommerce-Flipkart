@extends('layouts.admin')

@section('admin-content')

<style>

.form-box{
    width:400px;
    margin:auto;
    background:white;
    padding:30px;
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
}

</style>

<div class="form-box">

<h2>Add Offer</h2>

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

@stop