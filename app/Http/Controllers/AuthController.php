<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        session()->forget('account');
        return redirect()->route('auth.login')->with('success', 'Successfully logged out');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:account',
            'password' => 'required'
        ]);

        $account = Account::where('username', $request->username)->first();
        if (Hash::check($request->password, $account->password)) {
            session(['account' => $account]);
            return redirect()->route('dashboard.index')->with('success', 'Successfully logged in!');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|max:45|unique:account',
            'password' => 'required|min:8|max:250',
            'name' => 'required|string|min:3|max:45',
        ]);

        Account::insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'role' => 'author'
        ]);

        return redirect()->route('auth.login')->with('success', 'Your account has been registered');
    }
}
