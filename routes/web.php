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
//Route::get('/events/create', [EventController::class, 'create']);
//Route::get('/events/{id}', [EventController::class, 'show']);
//Route::post('/events', [EventController::class, 'store']);
//Route::delete('/events/{id}', [EventController::class, 'destroy']);
//Route::get('/events/edit/{id}', [EventController::class, 'edit']);
//Route::put('/events/update/{id}', [EventController::class, 'update']);

Route::get('/', [AssociatesController::class, 'index']);
Route::get('/associados/create', [AssociatesController::class, 'create']);
Route::get('/anuidades/create', [AnnuitiesController::class, 'createannu']);
Route::post('/anuidades', [AnnuitiesController::class, 'storeannu']);
Route::get('/associados/{id}', [AssociatesController::class, 'show']);
Route::post('/associados', [AssociatesController::class, 'store']);
Route::delete('/anuidades/{id}', [AssociatesController::class, 'destroy']);
Route::get('/associados/edit/{id}', [AssociatesController::class, 'edit']);
Route::put('/associados/update/{id}', [AssociatesController::class, 'update']);
Route::get('/dashboard', [AssociatesController::class, 'dashboard']);

//Route::get('/contact', function () {return view('contact');});



Route::get('/associados/view/{id}', [AssociatesController::class, 'viewAssociate']);
Route::post('/anuidades/pay/{id},{associd}', [AssociatesController::class, 'payAnnuity']);

Route::delete('/anuidades/unpay/{id},{associd}', [AssociatesController::class, 'unpayAnnuity']);

