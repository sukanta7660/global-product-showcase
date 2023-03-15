<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait MediaMan
{
    /**
     * @param $file
     * @param $path
     * @return mixed
     */
    public function storeFile($file, $path): mixed
    {
        // if not file
        if (!is_file($file)) {
            return $file;
        }

        // generate unique name for file
        $currentDate = now();
        $slugify = Str::slug($currentDate, '-') . '-' . uniqid();

        $extension = $file->getClientOriginalExtension();
        $extension = $extension === '' ? $file->extension() : $extension;
        $imageName = "$slugify.$extension";

        // Check if Path exist or not
        if (!Storage::disk('public')->exists($path)) {
            Storage::disk('public')->makeDirectory($path);
        }

        // Store File to Disk
        Storage::disk('public')->putFileAs($path . '/', $file, $imageName);
        return $imageName;
    }

    /**
     * @param $file
     * @param $path
     * @return void
     */
    public function deleteFile($file, $path): void
    {
        if (Storage::disk('public')->exists($path . '/' . $file)) {
            Storage::disk('public')->delete($path . '/' . $file);
        }
    }

    public function isImage($file): bool
    {

        if (!$this->isFile($file)) {
            return false;
        }

        $extension = $file->getClientOriginalExtension();
        $extension = $extension === '' ? $file->extension() : $extension;
        $acceptableImageFormat = ['jpg', 'jpeg', 'png'];

        return in_array(strtolower($extension), $acceptableImageFormat);
    }

    public function isFile($file): bool
    {
        return is_file($file);
    }
}
