<?php

namespace KereiKhan\QazhboardComponents\Concerns;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Image;

trait UploadFiles
{
    /** @var array|string[] */
    protected array $videoMimeTypes = [
        'video/mpeg',
        'video/mp4',
        'video/ogg',
        'video/quicktime',
        'video/webm',
        'video/x-ms-wmv',
        'video/x-flv',
        'video/3gpp',
        'video/3gpp2',
    ];

    /** @var array|string[] */
    protected array $imageExtensions = ['.jpg', '.jpeg', '.gif', '.png'];

    public function cleanURL(string $file_str): ?string
    {
        $file_str = str_replace('\/', '/', $file_str);
        $file_str = str_replace('"', '', $file_str);
        if (!$file_str || trim($file_str) == '') {
            return null;
        }

        return $file_str;
    }

    public function cleanFilePath(string $file_path): string
    {
        $parsed = parse_url($file_path);
        $file_path = $parsed['path'];

        return $this->deleteStorageWord($file_path);
    }

    public function deleteFile(string $file_path, string $disk = null): bool
    {
        $file_path = $this->cleanFilePath($file_path);

        return $this->driver($disk)->exists($file_path) &&
            $this->driver($disk)->delete($file_path);
    }

    public function deleteStorageWord(string $file_path): string
    {
        if (str_contains($file_path, 'storage')) {
            $file_path = str_replace('storage', '', $file_path);
        }

        return $file_path;
    }

    public function driver(string $disk = null): Filesystem
    {
        return Storage::disk($disk);
    }

    public function deleteOptimizedImage(string $file_path): bool
    {
        return $this->driver('public')->delete($file_path);
    }

    public function getExtension(UploadedFile|Image $file): string
    {
        if ($file instanceof Image) {
            return '.'.$file->extension;
        }

        return '.'.$file->getClientOriginalExtension();
    }

    public function generatePath(): string
    {
        return date('Y/m/d', time()).'/';
    }

    public function generateHash(): string
    {
        return Str::random(40);
    }

    public function getUrl(string $file_path, string $disk = null): ?string
    {
        return $this->driver($disk)->exists($file_path)
            ? $this->driver($disk)->url($file_path)
            : null;
    }

    public function isVideo(string $file_path, string $disk = null): bool
    {
        return in_array(
            $this->driver($disk)->mimeType($file_path),
            $this->videoMimeTypes
        );
    }

    public function isImage(UploadedFile|Image $file): bool
    {
        return in_array($this->getExtension($file), $this->imageExtensions);
    }

    public function optimizeImage(UploadedFile $file): array
    {
        if ($this->isImage($file)) {
            $path = 'images/'.time().'_'.$file->getClientOriginalName();
            $file_path = $this->getStoragePath($path);
            Image::make($file->getRealPath())
                ->resize(270, 160, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($file_path);

            return [
                new UploadedFile(
                    $file_path,
                    time().'_'.$file->getClientOriginalName()
                ),
                true,
                $path,
            ];
        }

        return [$file, false, null];
    }

    protected function getStoragePath(string $path): string
    {
        $final_path = "public/{$path}";
        if (!Storage::exists($final_path)) {
            $dir_path = explode('/', $path)[0];
            Storage::makeDirectory("public/{$dir_path}");
        }

        return Storage::path($final_path);
    }
}
