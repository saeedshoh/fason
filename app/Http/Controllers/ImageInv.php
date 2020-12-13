<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\ImageManagerStatic as Image;

class ImageInv extends Controller
{
    public function index()
    {
        $img = Image::make(public_path('/storage/example.jpg'))->resize(480, 480);

        $watermark = Image::make(public_path('/storage/logo_fason_white.png'))->resize(120, 37)->opacity('90');
        $img->insert($watermark, 'bottom-right', 25, 25);
        return $img->response('jpg');
    }
}
