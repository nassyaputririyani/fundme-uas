<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function register() {
        return view('register', ['title' => 'Register']);
    }

    public function registerStore(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
            'name' => ['required'],
            'gender' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput()->with('error', 'Gagal mendaftar akun');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
        ];

        User::create($data);

        return redirect()->route('login')->with('success', 'Berhasil mendaftar akun');
    }

    public function forgot() {
        return view('forgot-password', ['title' => 'Forgot Password']);
    }

    public function forgotStore(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput()->with('error', 'Gagal mengirim email');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}
