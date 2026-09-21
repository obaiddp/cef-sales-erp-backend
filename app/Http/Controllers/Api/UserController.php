<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('role')->get();

        return response()->json([
            'data' => $users
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $user = User::create($validated);
        $user->load('role');

        return response()->json([
            'message' => 'User was created successfully',
            'data' => $user
        ], 201);
    }


    public function show(string $id)
    {
        $user->load('role');

        return response()->json([
            'data' => $user
        ]);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'User was deleted successfully'
        ]);
    }
}
