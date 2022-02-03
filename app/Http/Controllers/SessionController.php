<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{

    public function destroy(){

        auth()->logout();
        return redirect('/home')->with('Success', 'Goodbye!');
    }


    public function login() {

        return view('login');

    }

    public function store() {

        session()->regenerate();

        $attributes = request()->validate([
            'email'=> 'required|exists:users,email',
            'password'=>'required'
        ]);

        //$attributes['password'] = Hash::make($attributes['password']);



        if(Auth::attempt($attributes)){
            return redirect('/home');
        }

        return back()->withInput()->withErrors(['email' => 'Your provided credentials cannot be verified']);

    }


}
