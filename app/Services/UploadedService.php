<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadedService
{
    function fileUpload(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = uniqid("file-") . "." . $extension;

        $urlFile = $file->storeAs('news', $fileName, 'public');
        if($urlFile) {
            return $urlFile;
        }

        throw new \Exception("File Not uploaded");
    }

}
