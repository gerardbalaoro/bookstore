<?php

namespace Calibre;

use Illuminate\Support\Facades\Storage;

class Filesystem
{
    /**
     * Calibre disk instance
     *
     * @var \Illuminate\Contracts\Filesystem
     */
    protected $disk;

    /**
     * Calibre configuration
     *
     * @var array
     */
    protected $config;

    /**
     * Create new instance
     */
    public function __construct(array $config)
    {
        $this->disk = Storage::disk($config['disk']);
        $this->config = $config;
    }

    /**
     * Prepend calibre path prefix
     *
     * @param string $path
     */
    protected function __prefix($path)
    {
        return $this->config['path'] . ($path ? DIRECTORY_SEPARATOR : '') . $path;
    }

    /**
     * Prepend calibre cache path prefix
     *
     * @param string $path
     */
    protected function __cachePath($path)
    {
        return $this->config['cache'] . ($path ? DIRECTORY_SEPARATOR : '') . $path;
    }

    /**
     * Assert that the given file exists.
     *
     * @param  string|array  $path
     * @return $this
     */
    public function assertExists($path)
    {
        return $this->disk->assertExists($this->__prefix($path));
    }

    /**
     * Assert that the given file does not exist.
     *
     * @param  string|array  $path
     * @return $this
     */
    public function assertMissing($path)
    {
        return $this->disk->assertMissing($this->__prefix($path));
    }

    /**
     * Determine if a file exists.
     *
     * @param  string  $path
     * @return bool
     */
    public function exists($path)
    {
        return $this->disk->exists($this->__prefix($path));
    }

    /**
     * Get the full path for the file at the given "short" path.
     *
     * @param  string  $path
     * @return string
     */
    public function path($path)
    {
        return $this->disk->getAdapter()->getPathPrefix() . $this->__prefix($path);
    }

    /**
     * Get the contents of a file.
     *
     * @param  string  $path
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function get($path)
    {
        return $this->disk->get($this->__prefix($path));
    }

    /**
     * Create a streamed response for a given file.
     *
     * @param  string  $path
     * @param  string|null  $name
     * @param  array|null  $headers
     * @param  string|null  $disposition
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function response($path, $name = null, array $headers = [], $disposition = 'inline')
    {
        return $this->disk->response($this->__prefix($path), $name, $headers, $disposition);
    }

    /**
     * Create a streamed download response for a given file.
     *
     * @param  string  $path
     * @param  string|null  $name
     * @param  array|null  $headers
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function download($path, $name = null, array $headers = [])
    {
        return $this->response($path, $name, $headers, 'attachment');
    }

    /**
     * Get the visibility for the given path.
     *
     * @param  string  $path
     * @return string
     */
    public function getVisibility($path)
    {
        return $this->disk->getVisibility($this->__prefix($path));
    }

    /**
     * Get the file size of a given file.
     *
     * @param  string  $path
     * @return int
     */
    public function size($path)
    {
        return $this->disk->getSize($this->__prefix($path));
    }

    /**
     * Get the mime-type of a given file.
     *
     * @param  string  $path
     * @return string|false
     */
    public function mimeType($path)
    {
        return $this->disk->getMimetype($this->__prefix($path));
    }

    /**
     * Get the file's last modification time.
     *
     * @param  string  $path
     * @return int
     */
    public function lastModified($path)
    {
        return $this->disk->getTimestamp($this->__prefix($path));
    }

    /**
     * Get the URL for the file at the given path.
     *
     * @param  string  $path
     * @return string
     *
     * @throws \RuntimeException
     */
    public function url($path)
    {
        return $this->disk->url($this->__prefix($path));
    }

    /**
     * Get a temporary URL for the file at the given path.
     *
     * @param  string  $path
     * @param  \DateTimeInterface  $expiration
     * @param  array  $options
     * @return string
     *
     * @throws \RuntimeException
     */
    public function temporaryUrl($path, $expiration, array $options = [])
    {
        return $this->disk->temporaryUrl($this->__prefix($path), $expiration, $options);
    }

    /**
     * Get an array of all files in a directory.
     *
     * @param  string|null  $directory
     * @param  bool  $recursive
     * @return array
     */
    public function files($directory = null, $recursive = false)
    {
        return $this->disk->files($this->__prefix($directory), $recursive);
    }

    /**
     * Get all of the files from the given directory (recursive).
     *
     * @param  string|null  $directory
     * @return array
     */
    public function allFiles($directory = null)
    {
        return $this->files($directory, true);
    }

    /**
     * Get all of the directories within a given directory.
     *
     * @param  string|null  $directory
     * @param  bool  $recursive
     * @return array
     */
    public function directories($directory = null, $recursive = false)
    {
        return $this->disk->directories($this->__prefix($directory), $recursive);
    }

    /**
     * Get all (recursive) of the directories within a given directory.
     *
     * @param  string|null  $directory
     * @return array
     */
    public function allDirectories($directory = null)
    {
        return $this->directories($directory, true);
    }

    /**
     * Determine if file is cached
     *
     * @param string $path
     * @return bool
     */
    public function isCached($path)
    {
        if ($this->disk === Storage::disk()) {
            return $this->disk->exists($path);
        }

        return Storage::exists($this->__cachePath($path));
    }

    /**
     * Download file to cache
     *
     * @param string $path
     */
    public function cache($path)
    {
        if ($this->disk === Storage::disk()) {
            return;
        }

        Storage::put($this->__cachePath($path), $this->get($path));
    }
}
