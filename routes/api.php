<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register/user', [ApiController::class, 'registerUser']);

Route::post('/login/user', [ApiController::class, 'loginUser']);

Route::get('/cooperatives', [ApiController::class, 'getCooperatives']);

Route::get('/user/carabaos', [ApiController::class, 'getUserCarabaos']);
