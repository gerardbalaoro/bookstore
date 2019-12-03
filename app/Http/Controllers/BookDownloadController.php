<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calibre\Filesystem;
use App\Download;

class BookDownloadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Calibre\Filesystem $files
     * @param  \App\Download $file
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Filesystem $files, Download $file)
    {
        if (!$request->hasValidSignature()) {
            return response(null, 401);
        }

        $file->loadMissing('volume');
        $file->volume->loadMissing('authors', 'series');
        $path = "{$file->volume->path}/$file->path";

        if (!$files->exists($path)) {
            return response(null, 404);
        }

        $authors = $file->volume->authors->pluck('name')->implode(', ');
        $title = $file->volume->title;
        $series = ($file->volume->series->count() ? (sprintf(
            " (%s, Book %s)",
            $file->volume->series[0]->name,
            round($file->volume->series_index, 2)
        )) : '');
        $format = strtolower($file->format);

        return $files->download($path, $this->safePath("{$authors} - {$title}{$series}.{$format}"));
    }

    /**
     * Combine and sanitize path
     *
     * @param string ...$names
     */
    private function safePath(string ...$names)
    {
        $remove = [':', '"', '/', '\\', '?', '#'];
        $names = array_map(function ($n) use ($remove) {
            return str_replace($remove, '', $n);
        }, $names);
        return implode('/', array_filter($names));
    }
}
