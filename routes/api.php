<?php

use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RolePermissionController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;


Route::apiResource('roles', RoleController::class)->only(['index', 'store']);
Route::apiResource('users', UserController::class);
Route::apiResource('permissions', PermissionController::class)->only(['index', 'store']);

Route::get('roles/{role}/permissions', [RolePermissionController::class, 'index']);
Route::post('roles/{role}/permissions/{permission}', [RolePermissionController::class, 'store']);
Route::delete('roles/{role}/permissions/{permission}', [RolePermissionController::class, 'destroy']);

// auth routes
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
});

// test
Route::middleware(['auth:sanctum', 'permission:Create Activity Entry'])->get('/test-create-permission', function() {
    return response()->json(['message' => 'You can create activities entries!']);
});