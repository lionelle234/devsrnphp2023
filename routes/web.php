<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\AssociatesController;
use App\Http\Controllers\AnnuitiesController;

//Route::get('/', [EventController::class, 'index']);
//Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
//Route::get('/events/{id}', [EventController::class, 'show']);
//Route::post('/events', [EventController::class, 'store']);
//Route::delete('/events/{id}', [EventController::class, 'destroy']);
//Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
//Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');

Route::get('/', [AssociatesController::class, 'index'])->middleware('auth');
Route::get('/associados/create', [AssociatesController::class, 'create'])->middleware('auth');
Route::get('/anuidades/create', [AnnuitiesController::class, 'createannu'])->middleware('auth');
Route::post('/anuidades', [AnnuitiesController::class, 'storeannu'])->middleware('auth');
Route::get('/associados/{id}', [AssociatesController::class, 'show'])->middleware('auth');
Route::post('/associados', [AssociatesController::class, 'store'])->middleware('auth');
Route::delete('/associados/{id}', [AssociatesController::class, 'destroy'])->middleware('auth');
Route::get('/associados/edit/{id}', [AssociatesController::class, 'edit'])->middleware('auth');
Route::put('/associados/update/{id}', [AssociatesController::class, 'update'])->middleware('auth');
Route::get('/dashboard', [AssociatesController::class, 'dashboard'])->middleware('auth');

//Route::get('/contact', function () {return view('contact');});



Route::get('/associados/view/{id}', [AssociatesController::class, 'viewAssociate'])->middleware('auth');
Route::post('/annuities/pay/{id},{associd}', [AssociatesController::class, 'payAnnuity'])->middleware('auth');

Route::delete('/associados/leave/{id}', [AssociatesController::class, 'leaveEvent'])->middleware('auth');

