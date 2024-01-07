<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function process(Request $request)
    {
        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
        ]);
        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);

        return redirect('/login')->with('message', 'Register Successfully!');;
    }
}
