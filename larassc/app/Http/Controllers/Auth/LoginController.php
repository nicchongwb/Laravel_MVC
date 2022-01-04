<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Middleware to not allow authenticated user to access login page
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // validation
        // validate(request, rules)
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Auth
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Invalid email or password');
        };

        return redirect()->route('dashboard');
    }
}
