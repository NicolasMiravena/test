<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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


Route::get('/', [ApiController::class, 'index']);
Route::get('/show', [ApiController::class, 'getIndicadores']);
Route::post('/save', [ApiController::class, 'saveIndicador']);
Route::post('/update', [ApiController::class, 'updateIndicador']);
Route::post('/delete', [ApiController::class, 'deleteIndicador']);
Route::get('/grafico', [ApiController::class, 'showGrafico']);
Route::post('/grafico', [ApiController::class, 'filtroGrafico']);
