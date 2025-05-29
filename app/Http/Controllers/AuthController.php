<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed, redirect to intended page or dashboard

            $user = Auth::user();
            return to_route('dashboard')->with('status', 'Welcome back, ' . $user->name . '!');
        }

        // Authentication failed, redirect back with error
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    } 
    
    public function logout()
    {
        // Log the user out
        Auth::logout();

        // Redirect to the login page or home page
        return redirect('/')->with('status', 'Logged out successfully');
    }
}
