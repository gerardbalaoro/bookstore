<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calibre\Filesystem;
use App\Book;
use Image;

class BookCoverController extends Controller
{
    /**
     * Display cover image of specified book
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Calibre\Filesystem $files
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Filesystem $files, Book $book)
    {
        $cover = $book->path.'/cover.jpg';
        $cache = !((bool) $request->get('refresh'));
        $image = Image::make($files->exists($cover, $cache) ? $files->get($cover, $cache) : public_path('images/cover.jpg'));
        if ($request->get('size') && $image->height() > $request->get('size')) {
            $image->heighten($request->get('size'));
        }

        return $image->response();
    }
}
