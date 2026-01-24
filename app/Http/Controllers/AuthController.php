<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Login logic here
        $data = $request->all();
        return view('auth.login', compact('data'));
    }

    public function register()
    {
        // Registration logic here
    }
}