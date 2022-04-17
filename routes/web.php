<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
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
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'showAdminDashboard'])->middleware(['auth'])->name('dashboard');

Route::get('/rental',)->middleware(['auth'])->name('rental');


Route::get('/book', [BookController::class, 'showBooksTablePage'])->middleware(['auth'])->name('book');

Route::get('/book/create', [BookController::class, 'create'])->middleware(['auth'])->name('create_book');
Route::get('/book/{id}', [BookController::class, 'showBookPage'])->middleware(['auth'])->name('book_by_id');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->middleware(['auth'])->name('delete_book_by_id');
Route::get('/book/edit/{id}', [BookController::class, 'edit'])->middleware(['auth'])->name('edit_page');
Route::post('/book/edit/{id}', [BookController::class, 'update'])->middleware(['auth'])->name('edit_book_by_id');


Route::get('/genre', function () {
    return view('dashboard');
})->middleware(['auth'])->name('genre');


Route::get('/my_rental', function () {
    return view('dashboard');
})->middleware(['auth'])->name('my_rental');


Route::get('/profile', function () {
    return view('dashboard');
})->middleware(['auth'])->name('profile');











require __DIR__ . '/auth.php';
