<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


    public function create() {
    return view('register.create');
    }

    public function store(){

        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7',
        ]);


        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/home')->with('Success', 'Your account has been created.');;
    }

    public function update(User $user) {

        $attributes = request()->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_admin' => 'required',
        ]);

        $user->update($attributes);

        return back()->with('success', 'Your user has been succesfully updated');
    }

    public function destroy(User $user) {
        $user->delete();
        return back()->with('success', 'This user has been deleted');
    }

    public function manage(){
        return view('admin-users', [
            'users' => User::paginate(50),
        ]);
    }

    public function edit (User $user){
        return view('register.edit-user', ['user'=>$user]);
    }

}
