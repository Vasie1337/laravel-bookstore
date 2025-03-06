<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'isbn' => 'required|unique:books,isbn|max:20',
            'image' => 'nullable|image|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/books');
            $validated['image'] = str_replace('public/', '', $path);
        }
        
        Book::create($validated);
        
        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'isbn' => 'required|max:20|unique:books,isbn,' . $book->id,
            'image' => 'nullable|image|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($book->image) {
                Storage::delete('public/' . $book->image);
            }
            
            $path = $request->file('image')->store('public/books');
            $validated['image'] = str_replace('public/', '', $path);
        }
        
        $book->update($validated);
        
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Delete the image if exists
        if ($book->image) {
            Storage::delete('public/' . $book->image);
        }
        
        $book->delete();
        
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
