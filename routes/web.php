<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::resource('books', BookController::class);

Route::get('/', [BookController::class, 'index'])->name('books.index'); // List books
Route::get('/books/create', [BookController::class, 'create'])->name('books.create'); // Show create form
Route::post('/books', [BookController::class, 'store'])->name('books.store'); // Store new book
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show'); // Show a single book
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit'); // Show edit form
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update'); // Update book
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy'); // Delete book


