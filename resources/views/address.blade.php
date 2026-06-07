@extends('layouts.app')

@section('content')

<div class="address-container">

    <h2 class="heading">Delivery Address</h2>

    <form action="/place-order" method="POST" class="address-form">

        @csrf

        <input type="text" name="name" placeholder="Full Name" required>

        <input type="text" name="phone" placeholder="Phone Number" required>

        <input type="text" name="city" placeholder="City" required>

        <input type="text" name="state" placeholder="State" required>

        <input type="text" name="pincode" placeholder="Pincode" required>

        <textarea 
            name="address" 
            placeholder="Full Address"
            rows="5"
            required
        ></textarea>

       <!-- PAYMENT METHOD -->

<div class="checkout-payment-wrapper">

    <h3 class="checkout-payment-title">
        Select Payment Method
    </h3>

    <div class="checkout-payment-list">

        <label class="checkout-payment-item">

            <span class="checkout-payment-label">
                Cash on Delivery
            </span>

        </label>

        <label class="checkout-payment-item">

            <span class="checkout-payment-label">
                UPI
            </span>

        </label>

        <label class="checkout-payment-item">

            <span class="checkout-payment-label">
                Credit / Debit Card
            </span>

        </label>

        <label class="checkout-payment-item">

            <span class="checkout-payment-label">
                Net Banking
            </span>

        </label>

    </div>

</div>

<button type="submit">
    Place Order
</button>

    </form>

</div>

@endsection