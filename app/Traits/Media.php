<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait Media {
    public function uploadFile($file,$path){

        if($file){
            // $filename = time() . '_' . $file->getClientOriginalName();
            $fileType =$file->getClientOriginalExtension();
            $fileName =  time().".". $fileType;
            Image::make($file)->resize(870,370)->save($path.$fileName);
            $filePath = $path.$fileName;

            return $file = [
                "fileName" => $fileName,
                "fileType" => $fileType,
                "filePath" => $filePath,
                "fileSize" => $this->fileSize($file)
            ];

        }
    }

    //Calculate file size
    public function fileSize($file, $precision = 2){

        $size = $file->getSize();

        if($size > 0){
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = ["bytes","KB","MB","GB","TB"];
            return round(pow(1024, $base - floor($base)), $precision). $suffixes[floor($base)];
        }

        return $size;

    }
}