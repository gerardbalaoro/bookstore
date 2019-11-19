<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        return view('publisher.index')->with([
            'publishers' => Publisher::orderBy('name', 'desc')->get()
        ]);
    }

    public function show(Publisher $publisher)
    {
        return view('book.index')->with([
            'books' => $publisher->books()->with('authors', 'ratings')->orderBy('pubdate', 'desc')->get(),
            'title' => $publisher->name
        ]);
    }
}
