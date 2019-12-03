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
                'books' => $request->s ? Book::search("*\"$request->s\"*")->with('authors', 'ratings')->paginate(30)->onEachSide(1) : []
            ]);
        }

        return view('home')->with([
            'top' => Book::popular()->with('authors')->limit(12)->get(),
            'new' => Book::with('authors', 'ratings')->orderBy('timestamp', 'desc')->limit(6)->get(),
            'latest' => Book::with('authors', 'ratings')->orderBy('pubdate', 'desc')->limit(12)->get()
        ]);
    }
}
