<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.product.index');
    }
    
    public function result(Request $request)
    {
        $id_bank = $request->bank_id;
        $response = Http::asForm()->post('http://149.129.221.143/kanaldata/Webservice/bank_account/', [
            'bank_id' => $id_bank
        ])->json();
        if ($response['status'] == 1) {
            return redirect()->route('product')
            ->with('success', json_encode($response));
        } else {
            return redirect()->route('product')
            ->with('message', 'Data tidak ditemukan');
        }
    }
}