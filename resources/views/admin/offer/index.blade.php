@extends('layouts.admin')

@section('admin-content')

<style>

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

table th,
table td{
    border:1px solid #ddd;
    padding:15px;
    text-align:center;
}

img{
    width:80px;
}

.edit-btn{
    background:green;
    color:white;
    padding:8px 15px;
    text-decoration:none;
}

.delete-btn{
    background:red;
    color:white;
    padding:8px 15px;
    text-decoration:none;
}

.add-btn{
    background:#2874f0;
    color:white;
    padding:10px 20px;
    text-decoration:none;
}

</style>

<h2>All Offers</h2>

<br>

<a href="{{ route('offers.create') }}"
   class="add-btn">
    Add New Offer
</a>

<br><br>

<table>

<tr>

    <th>ID</th>
    <th>Image</th>
    <th>Name</th>
    <th>Offer</th>
    <th>Edit</th>
    <th>Delete</th>

</tr>

@foreach($offers as $offer)

<tr>

    <td>{{ $offer->id }}</td>

    <td>
        <img src="{{ asset($offer->image) }}">
    </td>

    <td>{{ $offer->name }}</td>

    <td>{{ $offer->offer }}</td>

    <td>
        <a href="{{ route('offers.edit',$offer->id) }}"
           class="edit-btn">
            Edit
        </a>
    </td>

    <td>
        <a href="{{ route('offers.delete',$offer->id) }}"
           class="delete-btn">
            Delete
        </a>
    </td>

</tr>

@endforeach

</table>

@stop