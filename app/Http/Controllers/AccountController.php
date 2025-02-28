<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('dashboard.account.index', [
            'accounts' => $accounts
        ]);
    }

    public function create()
    {
        return view('dashboard.account.create', [
            'roles' => ['admin', 'author']
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|max:45|unique:account',
            'password' => 'required|min:8|max:250',
            'name' => 'required|string|min:3|max:45',
            'role' => 'required|in:admin,author'
        ]);

        Account::insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'role' => $request->role
        ]);

        return redirect()->route('account.index')->with('success', 'Account created successfully');
    }

    public function edit($username)
    {
        $account = Account::where('username', $username)->first();
        return view('dashboard.account.edit', [
            'account' => $account,
            'roles' => ['admin', 'author']
        ]);
    }

    public function update(Request $request, $username)
    {
        $request->validate([
            'username' => 'required|string|min:3|max:45',
            'password' => 'nullable|min:8|max:250',
            'name' => 'required|string|min:3|max:45',
            'role' => 'required|in:admin,author'
        ]);

        $account = Account::where('username', $username)->firstOrFail();

        if ($username !== $request->username) {
            $request->validate([
                'username' => 'unique:account,username'
            ]);
        }

        $account->update([
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $account->password,
            'name' => $request->name,
            'role' => $request->role
        ]);

        return redirect()->route('account.index')->with('success', 'Account updated successfully');
    }

    public function destroy($username)
    {
        Account::where('username', $username)->delete();
        return redirect()->route('account.index')->with('success', 'Account deleted successfully');
    }
}
