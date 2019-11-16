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
        return view('home')->with([
            'new' => \App\Book::with('authors', 'comments')->orderBy('timestamp', 'desc')->limit(6)->get(),
            'recent' => \App\Book::with('authors', 'comments')->orderBy('pubdate', 'desc')->limit(12)->get()
        ]);
    }
}
