<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index() {
        return view('login', ['title' => 'Login']);
    }

    public function storeLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($user = Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('index');
        } else {
            return redirect()->back()->withErrors(['password' => 'Email/password salah'])->withInput();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}
