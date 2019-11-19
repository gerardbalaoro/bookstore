<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calibre\Filesystem;
use App\Download;

class BookDownloadController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Calibre\Filesystem $files
     * @param  \App\Download $file
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Filesystem $files, Download $file)
    {
        if (!$request->hasValidSignature()) {
            return response(null, 401);
        }

        $file->loadMissing('volume');
        $path = "{$file->volume->path}/$file->path";

        if (!$files->exists($path)) {
            return response(null, 404);
        }

        return $files->download(
            $path, "{$file->volume->authors->pluck('name')->implode(', ')} - {$file->volume->title}." . strtolower($file->format)
        );
    }
}
