<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;

class ImageInv extends Controller
{
    public function index()
    {
        // $canva = Image::canvas(967, 800, '#0e0e0e');
        // $img = Image::make(public_path('/storage/example.jpg'))->resize(480, 480);

        // $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('90');
        // $img->insert($watermark, 'bottom-right', 25, 25);
        // $canva->insert($img, 'center', 25, 25);
        $img = Image::make(public_path('/storage/tort_slide.jpg'));
        $nowYear = now()->year . '/' . sprintf("%02d", now()->month) . '/' . uniqid();
        return $this->cropImage($img, 480, 50, $nowYear);
        // $this->cropImage($img, 800, 83, $nowYear);
        // return $canva->response('jpg');
    }

    function cropImage($img, $dimension, $sides, $nowYear)
        {
            $width  = $img->width();
            $height = $img->height();

            /*
            *  canvas
            */

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
                $right = $left = $sides;
                $newWidth = ($dimension) - ($left + $right);
                $img->resize($newWidth, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $image = $nowYear . $dimension . 'x' . $dimension . '.jpg';

            $img->resizeCanvas($dimension, $dimension, 'center', false, '#ffffff');
            $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('50');
            $img->insert($watermark, 'bottom-right', 75, 75);
            $img->save(public_path('/storage/' . $image));
            return $img->response('jpg');

        }

}
