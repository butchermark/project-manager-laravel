<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to("/login")->with('message', 'You are now logged out!');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'last_login' => 'nullable',
            'password' => ['required', 'min:6']
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        User::create($formFields);
        if ($request->header('referer') === "http://127.0.0.1:8000/users") {
            return redirect('/users')->with('message', 'User created successfully!');
        }
        return view('users.login')->with('message', 'User created successfully!');
    }

    public function authenticate(Request $request)
    {

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        $user = User::where('email', $formFields['email'])->first();
        $user->last_login = now();
        $user->save();
        Auth::login($user);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/users')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users')->with('message', 'User deleted successfully!');
    }

    public function suspend(User $user)
    {

        $user->is_suspended = true;
        $user->save();
        return redirect('/users')->with('message', 'User suspended successfully!');
    }
}
