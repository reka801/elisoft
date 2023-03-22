<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function FormRegister(){
        return view('register');
    }

    public function register(Request $request){
        // validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
        ]);
    
        // generate uuid
        $uuid = Uuid::uuid4()->toString();
    
        // create user
        User::create([
            'uuid' => $uuid,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('login')
            ->with('success', 'User created successfully.');
    }
    
}
