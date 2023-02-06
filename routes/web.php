<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;

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

Route::get('/', [DogController::class, 'index'])->name('welcome');

Route::get('/dashboard', [DogController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/search', [DogController::class, 'search'])->name('welcome');

Route::get('/dashboard/search', [DogController::class, 'search'])->middleware(['auth'])->name('dashboard');

Route::get('/add', function () {
    return view('add');
})->middleware(['auth'])->name('add');

Route::post('add-dog', [DogController::class, 'store']);

Route::post('update/{id}', [DogController::class, 'update']);

Route::get('/edit/{id}', [DogController::class, 'edit'])->middleware(['auth'])->name('edit');

Route::get('/confirm_delete/{id}', [DogController::class, 'confirmDelete'])->middleware(['auth'])->name('confirmDelete');

Route::get('/delete/{id}', [DogController::class, 'destroy'])->middleware(['auth']);




require __DIR__.'/auth.php';
