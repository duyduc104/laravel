<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function checkSignIn(Request $request)
    {
        $data = $request->all();
        // $request->validate([
        //     'age' => 'required|integer|min:1'
        // ]);
        // $age = $request->age;

        // if ($age < 18) {
        //     return redirect()
        //         ->back()
        //         ->withInput()
        //         ->with('error', 'Bạn phải đủ 18 tuổi để đăng nhập');
        // }

        $student = [
            'username' => 'Hieulx',
            'password' => '123abc',
            'repass' => '123abc',
            'mssv' => '26867',
            'lopmonhoc' => '67PM1',
            'gioitinh' => 'nam',
        ];
        // session(['student' => $student]);
        if (
            $data['password'] !== $data['repass']
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Mật khẩu và Re-Password không khớp');
        } else {
            if (
                $data['username'] !== $student['username'] ||
                $data['password'] !== $student['password'] ||
                $data['mssv'] !== $student['mssv'] ||
                $data['lopmonhoc'] !== $student['lopmonhoc'] ||
                $data['gioitinh'] !== $student['gioitinh']
            ) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Đăng ký thất bại');
            }
            return redirect()->route('age')->with('success', 'Đăng ký thành công, vui lòng nhập tuổi để tiếp tục');
        }
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
