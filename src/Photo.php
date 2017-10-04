<?php
namespace Basic;
//https://github.com/MeuGarfo/SimpleImage
class Photo{
    var $image;
    function auto_orient($src,$dst){
    	//autoOrient()
    }
    function crop($src,$dst,$x1,$y1,$x2,$y2){
    	//crop($x1, $y1, $x2, $y2)
    }
    function info($src){
    	//getMimeType()
    	//getHeight()
    	//getWidth()
    }
    function resize($src,$dst,$max_width,$max_height){
    	//bestFit($maxWidth, $maxHeight)
    }
    function thumbnail($src,$dst,$width,$height){
        //thumbnail($width, $height, $anchor)
    }
}
?>
