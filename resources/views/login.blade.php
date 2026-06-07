@extends('layouts.app')

@section('content')

<div class="login-page">

    <div class="login-box">

        <h2>User Login</h2>

        @if(session('error'))

            <p style="color:red;">
                {{ session('error') }}
            </p>

        @endif

        <form action="/login" method="POST">

            @csrf

            <input 
                type="email"
                name="email"
                placeholder="Enter Email"
            >

            <input 
                type="password"
                name="password"
                placeholder="Enter Password"
            >

            <button type="submit">
                Login
            </button>

        </form>

        <p>

            New User?

            <a href="/register">
                Create Account
            </a>

        </p>
        <p>
            Admin?
            <a href="/admin/login">Login</a>
        </p>
    </div>

</div>

@endsection