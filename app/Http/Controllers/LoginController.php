<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function execlogin(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        $user = User::where(function ($query) use ($data) {
                    $query->where('email', $data['email'])
                          ->orWhere('email', $data['email']);
                })
                ->first();
    
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return back()
                    ->withErrors(['email' => 'Wrong email or password!'])
                    ->withInput();
        }
    
        Auth::login($user);
    
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
    
}
