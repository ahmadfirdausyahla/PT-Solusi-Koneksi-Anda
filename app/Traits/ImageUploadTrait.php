<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

trait ImageUploadTrait
{
    public function uploadImage(UploadedFile $file, string $folder = 'images'): string
    {
        return $file->store($folder, 'public');
    }

    public function deleteImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)){
            Storage::disk('public')->delete($path);
        }
    }
}