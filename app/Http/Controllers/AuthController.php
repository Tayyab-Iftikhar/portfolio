<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(CreateUser $request)
    {

        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        return redirect()->route('frontend.login')->with('success', 'Registered Successfuly');

    }

    public function showRegisterForm()
    {
        return view('frontend.pages.registerPage');
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if (auth()->attempt($data)) {
            return redirect()->route('frontend.home')->with('success', 'Logged In Successfuly');
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }

    }
    public function showLoginForm()
    {
        return view('frontend.pages.loginPage');
    }
    public function logout(Request $request)
    {
        auth()->logout(); // Logs the user out

        $request->session()->invalidate(); // Destroys session data

        $request->session()->regenerateToken(); // Prevent CSRF issues

        return redirect()->route('frontend.login')->with('success', 'Logged out successfully');
    }
}
