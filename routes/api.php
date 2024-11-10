<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\UserController;
use App\Models\RoleController;
use App\Models\LoginController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
Route::post('login',[LoginController::class,'login']);
Route::middleware('auth:sanctum')->group(
    function(){
        Route::get('/user',[UserController::class,'index']);
        Route::get('/user/{id}', [UserController::class,'show'])->name('user.show');
        Route::post('/user',[UserController::class,'store']);
        Route::get('/role/{id}',[RoleController::class,'show']);
        Route::get('/role',[RoleController::class,'index']);
        Route::post('/role',[RoleController::class,'store']);
    }

);
