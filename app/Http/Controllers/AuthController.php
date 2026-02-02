<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function checkSignIn(Request $request)
    {
        $acc = $request->only('email', 'password');
        // dd($acc);
        if (Auth::attempt($acc)) {
            return redirect('/admin')
                ->with('success', 'Đăng nhập thành công');
        }
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Đăng nhập thất bại');
    }

    public function register()
    {
        // Registration logic here
    }
    public function SignIn()
    {
        return view('auth.signIn');
    }
    // public function postWelcome(Request $request)
    // {
    //     $request->validate([
    //         'age' => 'required|integer|min:1'
    //     ]);

    //     session(['age' => $request->age]);

    //     return redirect()->route('product.index');
    // }
}
