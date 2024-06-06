<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PostContoller;
use App\Http\Middleware\PemilikPostingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function(){
    //auth
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);
    
    //post
    Route::post('posts',[PostContoller::class, 'store']);
    Route::patch('posts/{id}',[PostContoller::class, 'update'])->middleware(PemilikPostingan::class);
    Route::delete('posts/{id}',[PostContoller::class, 'destroy'])->middleware(PemilikPostingan::class);
});

//post
Route::get('/posts', [PostContoller::class,'index']);
Route::get('/posts/{id}', [PostContoller::class,'show']);

//auth
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
