<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index()
    {
        return view('auth.logout');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
