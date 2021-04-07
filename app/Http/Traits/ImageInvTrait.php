<?php 

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

trait ImageInvTrait {

    function cropImage($img, $dimension, $sides, $nowYear)
    {
        $width  = $img->width();
        $height = $img->height();
        $vertical   = (($width < $height) ? true : false);
        $horizontal = (($width > $height) ? true : false);
        $square     = (($width = $height) ? true : false);

        if ($vertical) {
            $top = $bottom = 0;
            $newHeight = ($dimension) - ($bottom + $top);
            $img->resize(null, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            });

        } else if ($horizontal) {
            $right = $left = 0;
            $newWidth = ($dimension) - ($right + $left);
            $img->resize($newWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });

        } else if ($square) {
            $right = $left = 0;
            $newWidth = ($dimension) - ($left + $right);
            $img->resize($newWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $path = $nowYear . $dimension . 'x' . $dimension . '.jpg';

        // create an image manager instance with favored driver
        $manager = new ImageManager(array('driver' => 'gd'));

      
        $back = $manager->canvas($dimension, $dimension, '#ffffff');
        $back->insert($img, 'center');
        $watermark = Image::make(public_path('/storage/watermark_.png'));
        $back->insert($watermark, 'bottom-right', 50, 50);
        $back->save(public_path('/storage/' . $path));
    }

    public function uploadImage($image)
    {
        
        //Create folder if doesn't exist
        $month = public_path('/storage/').now()->year . '/' . sprintf("%02d", now()->month);
        if(!File::isDirectory($month)){
            File::makeDirectory($month);
        }
        $img = Image::make(public_path('/storage/'.$image));
        $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
        $this->cropImage($img, 800, 100, $nowYear);
        
        unlink(public_path('/storage/'.$image));
        return $nowYear . '800x800.jpg';
    }
}