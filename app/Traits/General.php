<?php
namespace App\Traits;

use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Storage;

trait General
{

    public function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function uploadFile($file, $dir_path)
    {
        $imagename = $this->generateRandomString().'.'.$file->getClientOriginalExtension();
        Storage::disk('public')->putFileAs($dir_path, $file, $imagename);
        return $imagename;
    }
}