<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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
        if (!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', 'Invalid email or password');
        };

        return redirect()->route('dashboard');
    }
}
