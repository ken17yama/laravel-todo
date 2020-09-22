<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\RoomController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/room');

Route::get('/hello', function () {
    return 'Hello World!';
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->resource('todos', TodoController::class);

// Route::middleware(['auth:sanctum', 'verified'])->resource('room', RoomController::class);

Route::middleware(['auth:sanctum', 'verified'])->prefix('room')->group(function () {
    Route::get('', [RoomController::class, 'index']);
});

Route::middleware(['auth:sanctum', 'verified', 'room'])->prefix('room')->group(function () {
    Route::get('{room_id}', [RoomController::class, 'show']);
});
