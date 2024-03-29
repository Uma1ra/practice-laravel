<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('users.index');
// });

Route::get('/', [UserController::class, 'index'])->name("users.index");
// Route::get('/user/{id}', 'UserController@show')->name("user.show");
Route::get('/user/{id}', [UserController::class, 'show'])->name("user.show");
Route::get('/users/create', [UserController::class, 'create'])->name("user.create");
Route::post('/users', [UserController::class, 'store'])->name("user.store");