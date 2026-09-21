<?php

use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\RolePermissionController;
use Illuminate\Support\Facades\Route;


Route::apiResource('roles', RoleController::class)->only(['index', 'store']);
Route::apiResource('users', UserController::class);
Route::apiResource('permissions', PermissionController::class)->only(['index', 'store']);

Route::get('roles/{role}/permissions', [RolePermissionController::class, 'index']);
Route::post('roles/{role}/permissions/{permission}', [RolePermissionController::class, 'store']);
Route::delete('roles/{role}/permissions/{permission}', [RolePermissionController::class, 'destroy']);