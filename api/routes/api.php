<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EmployéController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [App\Http\Controllers\EtudiantController::class, 'Register']);
Route::post('emargement', [App\Http\Controllers\EtudiantController::class, 'Emargement']);
Route::put('emargement/{id}', [App\Http\Controllers\EtudiantController::class, 'changeStatus']);
Route::get('etudiants', [App\Http\Controllers\EtudiantController::class, 'getEtudiants']);

Route::post('auth', [App\Http\Controllers\EmployéController::class, 'Authentification']);