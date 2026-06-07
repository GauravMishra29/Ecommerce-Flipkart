@extends('layouts.app')

@section('content')

<style>

.offer-section{
    background:white;
    margin:20px auto;
    width:92%;
    border:1px solid #ddd;
}

.offer-header{
    padding:18px;
    border-bottom:1px solid #ddd;
    font-size:22px;
    font-weight:bold;
}

.offer-grid{
    display:grid;
    grid-template-columns: repeat(4,1fr);
}

.offer-card{
    border-right:1px solid #eee;
    border-bottom:1px solid #eee;
    text-align:center;
    padding:25px 10px;
    transition:0.3s;
    background:white;

    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

.offer-card:hover{
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

.offer-card img{
    width:140px;
    height:140px;
    object-fit:contain;
    margin-bottom:15px;
}

.offer-name{
    font-size:20px;
    margin-bottom:8px;
    color:#333;
}

.offer-price{
    color:green;
    font-size:18px;
    font-weight:bold;
}

@media(max-width:900px){

    .offer-grid{
        grid-template-columns: repeat(2,1fr);
    }

}

@media(max-width:600px){

    .offer-grid{
        grid-template-columns:1fr;
    }

}

</style>

<div class="offer-section">

    <div class="offer-header">
        Appliance for Cool Summer
    </div>

    <div class="offer-grid">

        @foreach($offers as $offer)

        <div class="offer-card">

            <img src="{{ asset($offer->image) }}" alt="">

            <div class="offer-name">
                {{ $offer->name }}
            </div>

            <div class="offer-price">
                {{ $offer->offer }}
            </div>

        </div>

        @endforeach

    </div>

</div>

@stop