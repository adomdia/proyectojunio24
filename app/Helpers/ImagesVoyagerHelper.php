<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Storage;

class ImagesVoyagerHelper
{
    public static function getImage($file, $default = ''){
        if (!empty($file)) {
            return str_replace('\\', '/', Storage::disk(config('voyager.storage.disk'))->url($file));
        }

        return $default;
    }

}
