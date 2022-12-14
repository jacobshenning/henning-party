<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//  Auth routes
Route::controller(AuthController::class)
    ->middleware('auth.token')
    ->name('auth.')
    ->group(function () {

    //  Broadcast auth
    Route::match(['get', 'head', 'post'], 'broadcasting', 'broadcasting')->name('broadcasting.auth');

});


