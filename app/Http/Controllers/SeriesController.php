<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;

class SeriesController extends Controller
{
    public function index()
    {
        return view('series.index')->with([
            'series' => Series::orderBy('name', 'desc')->get()
        ]);
    }

    public function show(Series $series)
    {
        return view('book.index')->with([
            'title' => $series->name,
            'books' =>  $series->books()->with('authors', 'ratings')->orderBy('series_index')->paginate(30)->onEachSide(1)
        ]);
    }
}
