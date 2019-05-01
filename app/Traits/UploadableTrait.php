<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Storage;

trait UploadableTrait
{
    protected $disk = 'files';

    protected function uploadFile(UploadedFile $file)
    {
        $image = (object) [
            'title' => $file->getClientOriginalName(),
            'type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'src' => sprintf('%s-%s-%s', time(), mt_rand(), $file->hashName()),
        ];

        $storage = Storage::disk($this->disk);
        $storage->put($image->src, fopen($file->getRealPath(), 'r+'));
        if (file_exists($file->getRealPath())) {
            // Delete the temporary file
            unlink($file->getRealPath());
        }

        return $image;
    }

    protected function deleteSource($src)
    {
        $storage = Storage::disk($this->disk);
        if ($storage->has($src)) {
            return $storage->delete($src);
        }
    }
}
