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
    Route::get('alluser', [UserCVController::class, 'alluser']);
    Route::get('allusers', [UserCVController::class, 'showUsers']);

    Route::post('store', [CVstatusController::class, 'store']);
    Route::get('dashboard', [UserCVController::class, 'showcv'])
//            ->middleware(['auth', 'verified'])
        ->name('dashboard');

    // show all user with status
    Route::get('status',[UserCVController::class,'index']);

//for searching
    Route::post('search', [Search::class, 'render']);

//login
    Route::post('login', [UserCVController::class, 'login']);
    Route::post('signup', [UserCVController::class, 'sign_up']);

    Route::post('cvupdate/{id}',[UserCVController::class, 'update']);
    Route::delete('cvdelete/{id}',[UserCVController::class, 'destroy']);


})->middleware(['auth', 'verified']);
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
