<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class SwapController extends Controller
{
    public function index(){
        return view('dashboard.swapping.index');
    }

    public function exec(Request $request){
        // Menentukan variabel A dan B
        $a = $request->a;
        $b = $request->b;
        
        // Menampilkan nilai awal variabel A dan B
        $result = "Nilai awal A: " . $a . " ";
        $result .= "Nilai awal B: " . $b . " ";
        
        // Melakukan swapping nilai A dan B
        [$a, $b] = [$b, $a];
        
        // Menampilkan nilai setelah swapping
        $result .= "Nilai setelah swapping: ";
        $result .= "A: " . $a . " ";
        $result .= "B: " . $b . " ";
        
        // Mengembalikan hasil dalam bentuk redirect dengan pesan sukses
        return redirect()->back()->with('success', $result);
    }
    
    
}