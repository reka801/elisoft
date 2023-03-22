<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
    
        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid)
{
    $user = User::where('uuid', $uuid)->first();
    return view('dashboard.user.edit', compact('user'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->first();

        // Validasi data input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        // Update data
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Jika password diisi, maka update password
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        // Simpan perubahan
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
{
    // Get the user to be deleted
    $user = User::where('uuid', $uuid)->firstOrFail();

    // Check if the user to be deleted is the same as the currently logged-in user
    if (Auth::user()->id === $user->id) {
        return redirect()->back()->with(['message' => 'Anda tidak bisa menghapus akun yang sedang digunakan.']);
    }

    // Delete the user
    $user->delete();

    return redirect()->route('user.index')->with('success', 'User deleted successfully.');
}

}