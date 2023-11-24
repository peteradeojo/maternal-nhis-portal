<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'phone' => 'required|string',
                'password' => 'required|string'
            ]);

            $user = User::where('phone', $request->phone)->first();
            if (!$user || $user->department->code !== "NHI") {
                return redirect()->back()->withErrors("Forbidden");
            }

            if (Auth::attempt($request->only('phone', 'password'))) {
                return redirect()->route('dashboard');
            }
        }
        return view('auth.login');
    }

    function logout(Request $request) {
        session()->invalidate();
        return redirect()->route('login');
    }
}
