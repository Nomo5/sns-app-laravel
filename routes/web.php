<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function() {
    Route::get('/timeline', App\Http\Controllers\Timeline\IndexController::class)
    ->name('timeline.index');
    
    Route::post('/timeline/create', App\Http\Controllers\Timeline\CreateController::class)
    ->name('timeline.create');
    
    Route::get('/timeline/update/{postId}', App\Http\Controllers\Timeline\Update\IndexController::class)
    ->name('timeline.update.index')->where('postId', '[0-9]+');
    Route::put('/timeline/update/{postId}', App\Http\Controllers\Timeline\Update\PutController::class)
    ->name('timeline.update.put')->where('postId', '[0-9]+');
    
    Route::delete('/timeline/delete/{postId}', App\Http\Controllers\Timeline\DeleteController::class)
    ->name('timeline.delete')->where('postId', '[0-9]+');
});

require __DIR__.'/auth.php';
