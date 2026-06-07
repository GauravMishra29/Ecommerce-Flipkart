<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <style>

        body{
            font-family:Arial;
            background:#f1f3f6;
        }

        .login-box{
            width:350px;
            margin:100px auto;
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
            width:100%;
            padding:12px;
            background:#2874f0;
            color:white;
            border:none;
        }

    </style>

</head>
<body>

<div class="login-box">

    <h2>Admin Login</h2>

    @if(session('error'))

        <p style="color:red;">
            {{ session('error') }}
        </p>

    @endif

    <form action="/admin/login" method="POST">

        @csrf

        <input 
            type="email"
            name="email"
            placeholder="Admin Email"
        >

        <input 
            type="password"
            name="password"
            placeholder="Password"
        >

        <button type="submit">
            Login
        </button>

    </form>

</div>
  


    <!-- PASSWORD->  admin@gmail.com -> admin123  -->
</body>
</html>