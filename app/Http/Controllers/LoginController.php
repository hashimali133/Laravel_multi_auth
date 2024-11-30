<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerDataRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;




class LoginController extends Controller
{
    public function index(): view
    {
        return view('login');
    }
    // Authentication function
    public function authenticate(Request $request)
    {
        $validator = validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('account.dashboard');
            } else {
                return redirect()->route('account.login')->with('error', 'Either email or password is incorrect!');
            }
        } else {
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }
    }
    //this function will display Registeration form
    public function register()
    {
        return view('register');
    }
    //this function will register Data to dB
    public function registerData(registerDataRequest $request)
    {
        if ($request) {
            User::create($request->validated());
            return redirect()->route('account.login')->with('success', 'You have successfully Registered!');
        } else {
            return redirect()->route('account.register')->withInput()->withErrors($request->validated());
        }
    }
    //this function will logouts the user 
    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
