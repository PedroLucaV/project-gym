<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response('pong', 200);
});

Route::prefix('/user')->group(function(){
    Route::post('/member/register', [UserController::class, 'registerMember']);
    Route::post('/register', [UserController::class, 'registerUser']);
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/admin/register/', [UserController::class, 'registerAdmin']);
        Route::get('/users', [UserController::class, 'getAll']);
        Route::patch('/{id}', [UserController::class, 'updateUser']);
        Route::patch('/{id}/admin', [UserController::class, 'updateUserAdmin']);
        Route::delete('/{id}', [UserController::class, 'deleteUser']);
    });
});
