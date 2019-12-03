<?php

use Illuminate\Foundation\Inspiring;
use App\Calibre\Filesystem;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('calibre:download-db', function (Filesystem $files) {
    $this->comment('Downloading Database File...');
    $files->cache('metadata.db', false);
    $this->info('Finished');
});

Artisan::command('calibre:download-covers', function (Filesystem $files) {
    $this->line("Downloading Cover Images\n");
    $books = \App\Book::all();
    foreach ($books as $i => $book) {
        $cover = $book->path.'/cover.jpg';
        $progress = str_pad($i + 1, strlen((string) $books->count()), 0, STR_PAD_LEFT);
        $status = "[{$progress}/{$book->count()}]";
        $this->line(" - {$status} <fg=yellow>Downloading</>: {$book->title}");
        $files->cache($cover, false);
    }
    $this->info("\nDownload Finished");
});