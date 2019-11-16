<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of authors
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author.index')->with([
            'authors' => Author::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Display the specified author
     * 
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('book.index')->with([
            'title' => $author->name,
            'books' => $author->books()->with('authors', 'comments')->orderBy('pubdate', 'desc')->get()
        ]);
    }
}
