<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    public function index()
    {
        return view('Admin.login');
    }
    //t'is method will authenticate Admin
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        if ($validator->passes()) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::guard('admin')->user()->user_type !== 'admin') {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->withInput()->with('error', 'Access denied you\'re not authorized person!');
                }
                return redirect()->route('admin.profile');
            } else {
                return redirect()->route('admin.login')->withInput()->with('error', 'Either email or password is incorrect!');
            }
        } else {
            return redirect()->route('admin.login')->withInput()->withErrors($validator);
        }
    }
    public function register()
    {
        return view('register');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
