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
    Route::get('', [RoomController::class, 'index'])->name('room.index');
    Route::get('create', [RoomController::class, 'create'])->name('room.create');
    Route::post('store', [RoomController::class, 'store'])->name('room.store');
});

Route::middleware(['auth:sanctum', 'verified', 'room'])->prefix('room')->group(function () {
    Route::get('{room_id}/edit', [RoomController::class, 'edit'])->name('room.edit');
    Route::put('{room_id}', [RoomController::class, 'update'])->name('room.update');
    Route::delete('{room_id}', [RoomController::class, 'destroy'])->name('room.destroy');

    Route::get('{room_id}', [TodoController::class, 'index'])->name('todo.index');
    Route::get('{room_id}/create', [TodoController::class, 'create'])->name('todo.create');
    Route::post('{room_id}/store', [TodoController::class, 'store'])->name('todo.store');
    Route::get('{room_id}/{todo_id}', [TodoController::class, 'show'])->name('todo.show');
    Route::get('{room_id}/{todo_id}/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::put('{room_id}/{todo_id}', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('{room_id}/{todo_id}', [TodoController::class, 'destroy'])->name('todo.destroy');
});
