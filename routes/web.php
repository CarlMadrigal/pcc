<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarabaoController;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RedirectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RedirectController::class, 'redirectToHomepage']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/cooperative', [RedirectController::class, 'redirectToCooperativePage']);

Route::get('/cooperative/{id}', [RedirectController::class, 'redirectToCooperativeDetailsPage']);

Route::get('/register/cooperative', [RedirectController::class, 'redirectToRegisterCoop']);

Route::post('/register/cooperative/process', [CooperativeController::class, 'register']);

Route::get('/cooperative/{id}/register/carabao', [RedirectController::class, 'redirectToRegisterCarabaoPage']);

Route::post('/register/carabao/process', [CarabaoController::class, 'register']);

Route::get('/notification', [RedirectController::class, 'redirectToNotification']);
// Route::get('/test', [RedirectController::class, 'test']);
    