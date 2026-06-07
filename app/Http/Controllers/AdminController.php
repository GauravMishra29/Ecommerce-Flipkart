<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Login Page
    public function login()
    {
        return view('admin.login');
    }

    // Login Check
    public function authenticate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // Simple Admin Credentials
        if (
            $email == 'admin@gmail.com' &&
            $password == 'admin123'
        ) {

            session([
                'admin_logged_in' => true
            ]);

            return redirect('/products');
        }

        return back()->with(
            'error',
            'Invalid Admin Credentials'
        );
    }

    // Logout
    public function logout()
    {
        session()->forget('admin_logged_in');

        return redirect('/admin/login');
    }
}