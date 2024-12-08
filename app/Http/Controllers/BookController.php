<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Inertia\Inertia;
use Illuminate\Http\Request;

class BookController extends Controller
{
     // Display all books with optional status filtering
     public function index(Request $request)
     {
         $books = Book::query()
             ->when($request->status, fn($query, $status) => $query->where('status', $status))
             ->paginate(10);

         return Inertia::render('Books/Index', [
             'books' => $books,
         ]);
     }


     // Display details of a single book
     public function show(Book $book)
     {
         return Inertia::render('Books/Show', ['book' => $book]);
     }

     // Show a form to create a new book
     public function create()
     {
         return Inertia::render('Books/Create');
     }

     // Validate and create a new book
     public function store(Request $request)
     {
         $request->validate([
             'title' => 'required|string|max:255',
             'author' => 'required|string|max:255',
             'description' => 'required',
             'published_year' => 'required|integer|digits:4|min:1500|max:' . date('Y'),
             'status' => 'required|in:available,borrowed,reserved',
         ]);

         Book::create($request->all());

         return redirect()->route('books.index')->with('success', 'Book created successfully!');
     }

     // Show a form to edit an existing book
     public function edit(Book $book)
     {
         return Inertia::render('Books/Edit', ['book' => $book]);
     }

     // Validate and update book details
     public function update(Request $request, Book $book)
     {
         $request->validate([
             'title' => 'required|string|max:255',
             'author' => 'required|string|max:255',
             'description' => 'required',
             'published_year' => 'required|integer|digits:4|min:1500|max:' . date('Y'),
             'status' => 'required|in:available,borrowed,reserved',
         ]);

         $book->update($request->all());

         return redirect()->route('books.index')->with('success', 'Book updated successfully!');
     }

     //Soft Delete a book
     public function destroy(Book $book)
     {
         $book->delete();

         return redirect()->route('books.index')->with('success', 'Book archived successfully!');
     }
}
