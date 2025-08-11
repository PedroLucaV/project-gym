<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/user')->group(function(){
    Route::post('/member/register', [UserController::class, 'registerMember']);
    Route::post('/register', [UserController::class, 'registerUser']);
});
