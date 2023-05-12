<?php
//
//use App\Http\Controllers\admin\CVstatusController;
//use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\UserCVController;
//use Illuminate\Support\Facades\Route;
//
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider and all of them will
//| be assigned to the "web" middleware group. Make something great!
//|
//*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//// Route::get('/dashboard', function () {
////         return view('dashboard');
////     })->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::group(['prefix' => 'admin', 'middleware' => 'checkrole'], function (){
//    // showing our auth user all the cv's
////    Route::get('/dashboard', [UserCVController::class, 'showcv'])
////        ->middleware(['auth', 'verified'])
////        ->name('dashboard');
//    Route::get('showuser/{id}',[UserCVController::class, 'show']);
//// admin controller
//    Route::post('updateusercv', [CVstatusController::class, 'store'])
//        ->middleware(['auth', 'verified']);
////for searching the cv's
//    Route::get('searchCv', function (){
//        return view('searchCv');});
//});
//
//Route::prefix('admin')->group(function (){
//        Route::get('/dashboard', [UserCVController::class, 'showcv'])
//        ->middleware(['auth', 'verified'])
//        ->name('dashboard');
//});
//
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//
//// for normal user to insert the cv
//Route::get('applyforcv', [UserCVController::class, 'index']);
//Route::post('cvinsert', [UserCVController::class, 'store']);
//
//
//require __DIR__.'/auth.php';
