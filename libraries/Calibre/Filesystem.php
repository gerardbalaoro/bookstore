<?php

namespace Calibre;

use Illuminate\Support\Facades\Storage;
use League\Flysystem\Adapter\Local;

class Filesystem
{
    /**
     * Configuration data
     *
     * @var array
     */
    private $config;

    /**
     * Get storage disk instance
     *
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    public $disk;

    /**
     * Create new instance
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->disk = Storage::disk($config['disk']);
    }

    /**
     * Get path in calibre directory
     *
     * @param string $path
     * @return string
     */
    public function path(string $path = null)
    {
        return $this->config['path'] . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }

    /**
     * Determine if a file or directory exists.
     *
     * @param string $path
     * @param bool $cache Use cache
     * @return bool
     */
    public function exists(string $path, bool $cache = false)
    {
        if ($cache) {
            return Storage::exists($this->cachePath($path));
        }

        return $this->disk->exists($this->path($path));
    }

    /**
     * Get contents of a file
     *
     * @param string $path
     * @param bool $cache Use cache
     * @return mixed
     */
    public function get(string $path, bool $cache = false)
    {
        if ($cache && $this->exists($path, true)) {
            return Storage::get($this->cachePath($path));
        }

        $this->cache($path);
        return Storage::get($this->cachePath($path));
    }

    /**
     * Create a cached copy of a specified file
     *
     * @param string $path
     */
    public function cache(string $path)
    {
        if ($this->disk === Storage::disk()) {
            return null;
        }

        return Storage::put($this->cachePath($path), $this->disk->get($this->path($path)));
    }

    /**
     * Create a streamed download response for a given file.
     *
     * @param  string  $path
     * @param  string|null  $name
     * @param  array|null  $headers
     * @param  bool $cache Use cache
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download(string $path, string $name, array $headers = [], bool $cache = false)
    {
        if ($cache && $this->exists($path, true)) {
            return Storage::download($this->cachePath(path), $name);
        }

        return $this->disk->download($this->path($path), $name, $headers);
    }

    /**
     * Get path in calibre cache directory
     *
     * @param string $path
     */
    public function cachePath(string $path = null)
    {
        if ($this->disk === Storage::disk()) {
            return $this->path($path);
        }

        return $this->config['cache'] . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}