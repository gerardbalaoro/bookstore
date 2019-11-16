<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calibre\Filesystem;
use App\Download;
use App\Book;

class BookDownloadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Calibre\Filesystem $files
     * @param  \App\Book $book
     * @param  \App\Download $download
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Filesystem $files, Book $book, Download $file)
    {
        $path = "{$book->path}/$file->path";

        if (!$files->exists($path)) {
            return abort(404);
        }

        return $files->download(
            $path,
            "{$book->authors->pluck('name')->implode(', ')} - {$book->title}." . strtolower($file->format)
        );
    }
}
