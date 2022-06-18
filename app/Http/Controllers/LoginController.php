<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class LoginController extends Controller
{
    public function create() {
        return view('auth.login');
    }
    public function store(RegisterRequest $request) {
   
        $user = User::where('email', $request->email)->first();
       if(!$user) {
        return redirect('login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
       }
       $credentials = ['email' => $request->email, 'password' => $request-> password ];
       if(!Auth::attempt($credentials)) {
        return redirect('login');
       }
        return redirect('posts');
      
    }

    public function destroy() {
       Auth::logout();
       return redirect('login');
    }
}
