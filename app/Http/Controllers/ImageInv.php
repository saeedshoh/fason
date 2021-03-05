<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;

class ImageInv extends Controller
{
    public function index()
    {
        $canva = Image::canvas(967, 800, '#0e0e0e');
        $img = Image::make(public_path('/storage/example.jpg'))->resize(480, 480);

        $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('90');
        $img->insert($watermark, 'bottom-right', 25, 25);
        $canva->insert($img, 'center', 25, 25);
        $img = Image::make(public_path('/storage/tort_slide.jpg'));
        $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
        return $this->cropImage($img, 480, 50, $nowYear);
    }

    private function cropImage($img, $dimension, $sides, $nowYear)
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
        $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(134, 50)->opacity('50');
        $back->insert($watermark, 'bottom-right', 50, 50);
        $back->save(public_path('/storage/' . $path));
    }

    public function uploadImage(Request $request)
    {
        //Create folder if doesn't exist
        $month = public_path('/storage/').now()->year . '/' . sprintf("%02d", now()->month);
        if(!File::isDirectory($month)){
            File::makeDirectory($month);
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
        ]);

        $img = Image::make($request->file('image')->getRealPath());


        $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
        $this->cropImage($img, 800, 100, $nowYear);
        return $nowYear . '800x800.jpg';
    }
}
