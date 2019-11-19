<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->has('s')) {
            return view('book.index')->with([
                'title' => "Results for '{$request->s}'",
                'books' => $request->s ? Book::search("*\"$request->s\"*")->with('authors', 'ratings')->get() : []
            ]);
        }

        return view('home')->with([
            'new' => \App\Book::with('authors', 'ratings')->orderBy('timestamp', 'desc')->limit(6)->get(),
            'recent' => \App\Book::with('authors', 'ratings')->orderBy('pubdate', 'desc')->limit(12)->get()
        ]);
    }
}
