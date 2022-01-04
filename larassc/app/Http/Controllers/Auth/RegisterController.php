<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Middleware to not allow authenticated user to access register page
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }

    // Request object to get request reaching this api
    public function store(Request $request)
    {
        // validation
        // validate(request, rules)
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        // store user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]); // Laravel ORM aka Eloquent
       
        // sign the user in
        auth()->attempt($request->only('email', 'password'));

        // redirect
        return redirect()->route('dashboard');
    }
}
