<?php

use App\Http\Controllers\OrdarController;
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

Route::get('/', function () {
    return view('layouts.dashboard');
});

Route::get('create_order', function () {
    $action = 0;
    return view('create_order',compact('action'));
});

Route::put('insret', [OrdarController::class,'store']);
Route::get('all_orders', [OrdarController::class,'show']);
Route::delete('delete/{id}', [OrdarController::class,'destroy']);
Route::get('edit/{id}', [OrdarController::class,'edit']);
Route::put('update/{id}', [OrdarController::class,'update']);
