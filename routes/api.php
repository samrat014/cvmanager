<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserCVController;
use App\Http\Controllers\admin\CVstatusController;
use App\Http\Livewire\Search;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// here are all the api for the cvmanager

// for user to add the details

Route::post('cvinsert',[UserCVController::class, 'store']);

// for admin
Route::prefix('admin')->group(function () {
    Route::get('show/{id}', [UserCVController::class, 'show']);

    Route::post('store', [CVstatusController::class, 'store']);
    Route::get('dashboard', [UserCVController::class, 'showcv'])
//            ->middleware(['auth', 'verified'])
        ->name('dashboard');

//for searching
    Route::post('search', [Search::class, 'render']);

//login
    Route::post('login', [UserCVController::class, 'login']);

})->middleware(['auth', 'verified']);
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
