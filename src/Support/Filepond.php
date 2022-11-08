<?php

namespace KereiKhan\QazhboardComponents\Support;

use Illuminate\Http\UploadedFile;
use KereiKhan\QazhboardComponents\Concerns\UploadFiles;

class Filepond
{
    use UploadFiles;

    public function upload(UploadedFile $file, string $disk = ''): string
    {
        $file_name = $this->generateHash() . $this->getExtension($file);
        [$file, $ok, $image_path] = $this->optimizeImage($file);
        $driver = $this->driver($disk);
        $driver->putFileAs($this->generatePath(), $file, $file_name);
        if ($ok && $image_path) {
            $this->deleteOptimizedImage($image_path);
        }
        return $driver->url($this->generatePath() . $file_name);
    }
}
