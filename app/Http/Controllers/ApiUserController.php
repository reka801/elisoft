<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.user-api');
        
    }

    public function get_user()
    {
        $users = User::all();
        if(count($users) > 0) {
            $response = json_encode([
                'status' => true,
                'message' => 'Data berhasil di hit',
                'data' => $users
            ]);
            return redirect()->route('user-api.index')
            ->with('success', $response);
        } else {
            $response = json_encode([
                'status' => false,
                'message' => 'Data not found',
                'data' => NULL
            ]);
            return redirect()->route('user-api.index')
            ->with('success', $response);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}