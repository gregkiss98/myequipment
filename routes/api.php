<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ToolController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::resource('/tools', ToolController::class);
    Route::put('tools/borrow/{id}', [ToolController::class, 'borrow'])->name('borrow');
    Route::get('tools/endborrow/{id}', [ToolController::class, 'endborrow'])->name('endborrow');
    Route::resource('/events', EventController::class);
    Route::get('/support', [EventController::class, 'support'])->name('support');
});

Route::post('/tokenGen', [\App\Http\Controllers\UserController::class, 'tokenGen']);
