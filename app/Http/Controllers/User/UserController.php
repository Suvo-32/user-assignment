<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all(); // returns a Collection (countable)

        $create_user_check = Auth::User()->role;

        return view('stafflist', compact('users', 'create_user_check')); // passes ['users' => $users]
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $validated = $request->validate([
                'employee_id' => 'required|string|max:255|unique:users',
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'dob' => 'required|string|date',
                'doj' => 'required|string|date',
                'role' => 'required|string|in:admin,user',
                'password' => 'required|string|min:8',
            ]);

            $user = User::create([
                'employee_id' => $validated['employee_id'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'dob' => $validated['dob'],
                'doj' => $validated['doj'],
                'role' => $validated['role'],
                'password' => Hash::make($validated['password']),
            ]);

            $users = User::all(); // returns a Collection (countable)

            $create_user_check = Auth::User()->role;

            return view('stafflist', compact('users', 'create_user_check')); // passes ['users' => $users]
        } catch (ValidationException $th) {
            return redirect()->back()
                ->withErrors($th->validator)
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
