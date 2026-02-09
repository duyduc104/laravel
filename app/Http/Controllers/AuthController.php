<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function checkSignIn(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            Auth::login($user);

            return redirect('/admin/home')
                ->with('success', 'Đăng nhập thành công');
        }

        return redirect()->back()
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
