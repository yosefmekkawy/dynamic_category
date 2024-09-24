<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $data = $request->validate(['email'=>'required','password'=>'required']);
        if(Auth::attempt($data)){
            return redirect()->to('/products');
        }
        else {
            return redirect()->back()->withErrors(['error' => 'Email or password invalid']);
        }
    }
}
