<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;

class RolePermissionController extends Controller
{
    public function index(Role $role){
        return response()->json([
            'data' => $role->permissions
        ]);
    }

    public function store(Role $role, Permission $permission) { 
        $role->permissions()->syncWithoutDetaching($permission->id); 
        return response()->json([ 
            'message' => 'Permission assigned to role successfully', 
            'data' => $role->load('permissions'),
        ]); 
    }

    public function destroy(Role $role, Permission $permission) { 
        $role->permissions()->detach($permission->id); 
        return response()->json([ 
            'message' => 'Permission removed from role successfully', 
            'data' => $role->load('permissions'), 
        ]); 
    }
}
