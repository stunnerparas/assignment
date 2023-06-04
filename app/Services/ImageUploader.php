<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ImageUploader
{
    public function upload(UploadedFile $file)
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('public/images', $filename);

        return $filename;
    }
}