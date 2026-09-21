<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $role = Role::create($validated);
        
        return response()->json([
            'message' => 'Roles were created successfully',
            'data' => $role
        ], 201);
    }
}
