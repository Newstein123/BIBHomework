<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store(RegisterRequest $request) {

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
        
        return redirect('login');
    }
}
