<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BilanganController extends Controller
{
    public function index(){
        return view('dashboard.bilangan.index');
    }

    public function exec(Request $request){
        function terbilang($angka) {
            $angka = abs($angka); // menghindari angka negatif
            $angka_word = array(
                "", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"
            );
            $terbilang = "";
            if ($angka < 12) {
                $terbilang = $angka_word[$angka];
            } else if ($angka < 20) {
                $terbilang = terbilang($angka - 10) . " Belas";
            } else if ($angka < 100) {
                $terbilang = terbilang($angka / 10) . " Puluh " . terbilang($angka % 10);
            } else if ($angka < 200) {
                $terbilang = " Seratus " . terbilang($angka - 100);
            } else if ($angka < 1000) {
                $terbilang = terbilang($angka / 100) . " Ratus " . terbilang($angka % 100);
            } else if ($angka < 2000) {
                $terbilang = " Seribu " . terbilang($angka - 1000);
            } else if ($angka < 1000000) {
                $terbilang = terbilang($angka / 1000) . " Ribu " . terbilang($angka % 1000);
            } else if ($angka < 1000000000) {
                $terbilang = terbilang($angka / 1000000) . " Juta " . terbilang($angka % 1000000);
            } else if ($angka < 1000000000000) {
                $terbilang = terbilang($angka / 1000000000) . " Milyar " . terbilang($angka % 1000000000);
            } else if ($angka >= 1000000000000 && $angka < 2000000000000) {
                $terbilang = " Satu Triliun " . terbilang($angka - 1000000000000);
            } else if ($angka >= 2000000000000) {
                $terbilang = "Angka terlalu besar";
            } else {
                $terbilang = "Angka terlalu besar";
            }
            return $terbilang;
        }
    
        $angka = $request->angka;
        if ($angka >= 2000000000) {
            return redirect()->back()->with(['terbilang' => 'Angka terlalu besar']);
        }
        $terbilang = terbilang($angka);
        return redirect()->back()->with(['terbilang' => $terbilang]);
    }
    
}