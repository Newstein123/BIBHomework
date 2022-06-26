<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create() {
        return view('auth.login');
    }
    public function store(Request $request) {
   
        $user = User::where('email', $request->email)->first();
       if(! $user) {
        throw ValidationException::withMessages([
            'email' => 'email is not registered'
        ]);
        return redirect('login');
       }

       $credentials = [ 
        'email' => $request->email,
        'password' => $request-> password
       ];
      if( !Auth::attempt($credentials)) {
        throw ValidationException::withMessages([
            'email' => 'email or password is incorrect'
        ]);
        return redirect('login');
      } else {
        return redirect('/posts');
      } ;
    }
    public function destroy() {
        Auth::logout();
        return redirect('posts');
    }

       }
        

