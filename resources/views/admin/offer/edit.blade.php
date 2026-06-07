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

img{
    width:120px;
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

<h2>Edit Offer</h2>

<form action="{{ route('offers.update',$offer->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <input type="text"
           name="name"
           value="{{ $offer->name }}">

    <input type="text"
           name="offer"
           value="{{ $offer->offer }}">

    <img src="{{ asset($offer->image) }}">

    <input type="file"
           name="image">

    <button type="submit">
        Update Offer
    </button>

</form>

</div>

@stop