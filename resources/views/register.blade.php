@extends('layouts.app')

@section('content')

<div class="login-page">

    <div class="login-box">

        <h2>Create Account</h2>

        <form action="/register" method="POST">

            @csrf

            <input 
                type="text"
                name="name"
                placeholder="Full Name"
            >

            <input 
                type="email"
                name="email"
                placeholder="Enter Email"
            >

            <input 
                type="password"
                name="password"
                placeholder="Create Password"
            >

            <button type="submit">
                Register
            </button>

        </form>

        <p>

            Already Have Account?

            <a href="/login">
                Login
            </a>

        </p>

    </div>

</div>

@endsection