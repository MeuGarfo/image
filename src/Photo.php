<?php
namespace Basic;
use claviska\SimpleImage;
class Photo{
    function auto_orient($src,$dst=false){
        if(!$dst){
            $dst=$src;
        }
        return $this
        ->image($src)
        ->autoOrient()
        ->toFile($dst);
    }
    function crop($src,$dst,$x1,$y1,$x2,$y2){
        return $this
        ->image($src)
        ->crop($x1, $y1, $x2, $y2)
        ->toFile($dst);
    }
    function image($src){
        $image = new \claviska\SimpleImage();
        return $image->fromFile($src);
    }
    function info($src){
        $image=$this->image($src);
        $info['width']=$image->getWidth();
        $info['height']=$image->getHeight();
        $info['orientation']=$image->getOrientation();
        $info['mime']=$image->getMimeType();
        $info['exif']=$image->getExif();
        return $info;
    }
    function resize($src,$dst,$max_width,$max_height){
        return $this
        ->image($src)
        ->bestFit($max_width, $max_height)
        ->toFile($dst);
    }
    function thumb($src,$dst,$width,$height){
        $anchor='center';
        return $this
        ->image($src)
        ->thumbnail($width, $height, $anchor)
        ->toFile($dst);
    }
}
