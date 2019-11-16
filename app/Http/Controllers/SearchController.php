<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('book.index')->with([
            'title' => "Results for '{$request->q}'",
            'books' => Book::search("*\"$request->q\"*")->with('authors', 'comments')->get()
        ]);
    }
}
