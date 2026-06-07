<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Register Page
    public function register()
    {
        return view('register');
    }

    // Register User
    public function storeRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        session([
            'user_id' => $user->id,
            'user_name' => $user->name
        ]);

        return redirect('/');
    }

    // Login Page
    public function login()
    {
        return view('login');
    }

    // Login User
    public function authenticate(Request $request)
    {
        $user = User::where(
            'email',
            $request->email
        )->first();

        if (
            $user &&
            Hash::check(
                $request->password,
                $user->password
            )
        ) {

            session([
                'user_id' => $user->id,
                'user_name' => $user->name
            ]);

            return redirect('/');
        }

        return back()->with(
            'error',
            'Invalid Credentials'
        );
    }

    // Logout
    public function logout()
    {
        session()->forget('user_id');
        session()->forget('user_name');

        return redirect('/login');
    }
}