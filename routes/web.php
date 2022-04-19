<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/profile',view('common.profile'))->middleware(['auth'])->name('profile');


// Book Routes
Route::get('/book', [BookController::class, 'index'])->middleware(['auth'])->name('book');

Route::get('/book/create', [BookController::class, 'create'])->middleware(['auth'])->name('create_book_form');
Route::post('/book/create', [BookController::class, 'store'])->middleware(['auth'])->name('create_book');

Route::get('/book/{id}', [BookController::class, 'showBookPage'])->middleware(['auth'])->name('book_by_id');
Route::delete('/book/{id}', [BookController::class, 'destroy'])->middleware(['auth'])->name('delete_book_by_id');

Route::get('/book/edit/{id}', [BookController::class, 'edit'])->middleware(['auth'])->name('edit_page');
Route::post('/book/edit/{id}', [BookController::class, 'update'])->middleware(['auth'])->name('edit_book_by_id');
Route::post('/book/{id}/borrow', [BookController::class, 'borrow'])->middleware(['auth'])->name('borrow_book_by_id');


// /book/{{$book->id}}/borrow

//Genres Route
Route::get('/genre', [GenreController::class, 'index'])->middleware(['auth'])->name('genre');

Route::get('/genre/{id}/edit', [GenreController::class, 'edit'])->middleware(['auth'])->name('genre_edit_page');
Route::get('/genre/{id}/books', [GenreController::class, 'showBooksByGenre'])->middleware(['auth'])->name('genre_book_page');

Route::post('/genre/{id}/edit', [GenreController::class, 'update'])->middleware(['auth'])->name('genre_edit');

Route::post('/genre', [GenreController::class, 'store'])->middleware(['auth'])->name('genre_store');
Route::delete('/genre/{id}/delete', [GenreController::class, 'destroy'])->middleware(['auth'])->name('genre_delete');


//Rentals
Route::get('/rental', [BorrowController::class, 'index'])->middleware(['auth'])->name('rental');
Route::get('/rental/{id}', [BorrowController::class, 'view'])->middleware(['auth'])->name('view_rental');
Route::delete('/rental/{id}/reject', [BorrowController::class, 'reject'])->middleware(['auth'])->name('reject_rental');
Route::post('/rental/{id}/accept', [BorrowController::class, 'accept'])->middleware(['auth'])->name('accept_rental');
Route::post('/rental/{id}/return', [BorrowController::class, 'return'])->middleware(['auth'])->name('return_rental');










require __DIR__ . '/auth.php';
