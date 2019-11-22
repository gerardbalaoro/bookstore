<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        return view('book.index')->with([
            'title' => 'All Books',
            'books' => Book::orderBy('title')->with('authors', 'ratings')->paginate(30)->onEachSide(1)
        ]);
    }

    public function show(Book $book)
    {
        $book->loadMissing('authors', 'comments', 'publishers', 'series', 'tags', 'ratings', 'downloads');
        return view('book.show')->with([
            'book'  => $book,
            'title' => $book->title
        ]);
    }
}
