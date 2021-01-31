<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
        // $this->cropImage($img, 800, 83, $nowYear);
        // return $canva->response('jpg');
    }

    private function cropImage($img, $dimension, $sides, $nowYear)
    {
        $width  = $img->width();
        $height = $img->height();
        $vertical   = (($width < $height) ? true : false);
        $horizontal = (($width > $height) ? true : false);
        $square     = (($width = $height) ? true : false);

        if ($vertical) {
            $top = $bottom = $sides;
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
        $image = $nowYear . $dimension . 'x' . $dimension . '.jpg';

        $img->resizeCanvas($dimension, $dimension, 'center', false, '#ffffff');
        $img->save(public_path('/storage/' . $image));
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,WebP,webp',
        ]);

        $img = Image::make($request->file('image')->getRealPath());
        $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('50');
        $img->insert($watermark, 'bottom-right', 50, 50);

        //Create folder if doesn't exist
        $yearFolder = now()->year . '/' . sprintf("%02d", now()->month);
        if(!File::isDirectory($yearFolder)){
            File::makeDirectory($yearFolder, 0777, true);
        }

        $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
        $this->cropImage($img, 480, 50, $nowYear);
        $this->cropImage($img, 800, 83, $nowYear);
        return $nowYear . '480x480.jpg';
    }
}
