<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function age(){
        return view('age');
    }
    public function checkAge(Request $request){
        $age = $request->age;
        session(['age' => $age]);
        return redirect()->route('product.index');
    }
}
