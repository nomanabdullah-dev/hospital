<?php

namespace App\Helpers;
use Intervention\Image\Facades\Image;
use File;

class ImageHelper
{
    public static function Image(array $image_parameters = null) {
        $image = $image_parameters['image'];
        $directory = 'uploads/images/'.$image_parameters['directory'];
        $width = @$image_parameters['width'] ?? '100%';
        $height = @$image_parameters['height'] ?? '100%';

        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME).'_'.rand(1000000,9999999);
        $extension = $image->extension();
        $name = $filename.'.'.$extension;
        $path = $directory.'/'.$name;
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0775, true, true);
        }
        $img = Image::make($image->path());
        $img->resize($width, $height, function ($constraint) {
        })->save($path);
        return $path;
    }

    public static function Attachment(array $file_parameters = null) {
        $file = $file_parameters['file'];
        $directory = $file_parameters['directory'];

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'_'.rand(1000000,9999999);
        $extension = $file->getClientOriginalExtension();
        $name = $filename.'.'.$extension;
        \Storage::disk('custom')->put('/uploads/attachment/'.$directory.'/'.$name,$file->get());
        $path = 'uploads/attachment/'.$directory.'/'.$name;
        return $path;
    }

}
