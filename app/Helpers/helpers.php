<?php

if (! function_exists('getMobiCover')) {
    function getMobiCover($path)
    {
       $data = substr($path, 0, 7);
       $filename = substr($path, 8, 40);
       $filename = $data.'/450x220-'.$filename;
       return $filename;
    }
}
