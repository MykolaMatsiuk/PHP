<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index () 
    {
        return view('register');
    }

    public function register ()
    {
        $user = new User();

        $this->validate(request(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name'     => request('name'),
            'email'    => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        $msg = "New user registered successfully!";
        return view('welcome', ['msg' => $msg]);
    }
}
