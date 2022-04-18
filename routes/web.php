<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
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

// Book Routes
Route::get('/book', [BookController::class, 'showBooksTablePage'])->middleware(['auth'])->name('book');

Route::get('/book/create', [BookController::class, 'create'])->middleware(['auth'])->name('create_book');
Route::post('/book/create', [BookController::class, 'store'])->middleware(['auth'])->name('create_book');

Route::get('/book/{id}', [BookController::class, 'showBookPage'])->middleware(['auth'])->name('book_by_id');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->middleware(['auth'])->name('delete_book_by_id');

Route::get('/book/edit/{id}', [BookController::class, 'edit'])->middleware(['auth'])->name('edit_page');
Route::post('/book/edit/{id}', [BookController::class, 'update'])->middleware(['auth'])->name('edit_book_by_id');


//Genres Route
Route::get('/genre', [GenreController::class, 'index'])->middleware(['auth'])->name('genre');

Route::get('/genre/{id}/edit', [GenreController::class, 'edit'])->middleware(['auth'])->name('genre_edit_page');
Route::post('/genre/{id}/edit', [GenreController::class, 'update'])->middleware(['auth'])->name('genre_edit');


Route::delete('/genre/{id}/delete', [GenreController::class, 'destroy'])->middleware(['auth'])->name('genre_delete');
Route::post('/genre', [GenreController::class, 'store'])->middleware(['auth'])->name('genre_store');



Route::get('/my_rental', function () {
    return view('dashboard');
})->middleware(['auth'])->name('my_rental');


Route::get('/profile', function () {
    return view('dashboard');
})->middleware(['auth'])->name('profile');











require __DIR__ . '/auth.php';
