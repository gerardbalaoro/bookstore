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
     * @param  \Calibre\Filesystem $disk
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Filesystem $disk, Book $book)
    {
        $cover = $book->path.'/cover.jpg';
        $image = Image::make($disk->exists($cover) ? $disk->get($cover) : public_path('images/cover.jpg'));
        if ($request->get('size') && $image->height() > $request->get('size')) {
            $image->heighten($request->get('size'));
        }

        return $image->response();
    }
}
