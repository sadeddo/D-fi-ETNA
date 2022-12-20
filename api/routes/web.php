<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\PdfController;
use App\Models\Etudiant;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth'])->name('admin');

Route::get('admin',[EtudiantController::class, 'show']);

Route::post('/justification/{id}', [EtudiantController::class,'justification']);

Route::post('click_edit/{id} ',[EtudiantController::class,'edit_function']);

Route::get('/etudiant/{login}',[EtudiantController::class, 'index3']);
Route::get('/', function () {
    return view('auth/login');
});


Route::get('/search',[EtudiantController::class, 'search'])->name('search.etudiant');


Route::get('/generate', [PdfController::class, 'generatePDF'])->name('generate');

require __DIR__.'/auth.php';

