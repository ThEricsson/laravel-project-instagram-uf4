<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/config', function () {
    return view('config');
})->name('config');

Route::get('/configpass', function () {
    return view('configpass');
})->name('configpass');

Route::post('/update',[UserController::class, 'update'])
->name('update');

Route::post('/updatepass',[UserController::class, 'updatepass'])
->name('updatepass');

Route::get('/getimage/{filename}', [UserController::class, 'getImage'])
->name('getimage');

Route::get('/updateimg', function(){
    return view('updateimg');
})->name('updateimg');

Route::post('postimg', [ImageController::class, 'store'])
->name('postimg');

require __DIR__.'/auth.php';
