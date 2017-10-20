<?php
/**
* Basic
* Micro framework em PHP
*/

namespace Basic;

use claviska\SimpleImage;

/**
* Classe Image
*/
class Image
{
    /**
    * Orientação automática da imagem
    * @param  string $src Imagem de origem
    * @param  string $dst Imagem de destino
    * @return bool        Retorna true ou false
    */
    public function autoOrient(string $src, string $dst):bool
    {
        if (!$dst) {
            $dst=$src;
        }
        return $this
        ->image($src)
        ->autoOrient()
        ->toFile($dst);
    }
    /**
    * Recortar imagem
    * @param  string  $src Imagem de origem
    * @param  string  $dst Imagem de destino
    * @param  integer $x1  Coordenada x1
    * @param  integer $y1  Coordenada y1
    * @param  integer $x2  Coordenada x2
    * @param  integer $y2  Coordenada y2
    * @return bool         retorna true ou false
    */
    public function crop(string $src, string $dst, integer $x1, integer $y1, integer $x2, integer $y2):bool
    {
        return $this
        ->image($src)
        ->crop($x1, $y1, $x2, $y2)
        ->toFile($dst);
    }
    /**
    * Instância da classe
    * @param  string $src Imagem de origem
    * @return object      Instância da classe SimpleImage
    */
    public function image(string $src):object
    {
        $image = new \claviska\SimpleImage();
        return $image->fromFile($src);
    }
    /**
    * Informações sobre a imagem
    * @param  string $src Imagem de origem
    * @return array       Dados da imagem
    */
    public function info(string $src):array
    {
        $image=$this->image($src);
        $info['width']=$image->getWidth();
        $info['height']=$image->getHeight();
        $info['orientation']=$image->getOrientation();
        $info['mime']=$image->getMimeType();
        $info['exif']=$image->getExif();
        return $info;
    }
    /**
    * Redimensionar imagem
    * @param  string  $src        Imagem de origem
    * @param  string  $dst        Imagem de destino
    * @param  integer $max_width  Largura máxima
    * @param  integer $max_height Altura máxima
    * @return bool                Retorna true ou false
    */
    public function resize(string $src, string $dst, integer $max_width, integer $max_height):bool
    {
        return $this
        ->image($src)
        ->bestFit($max_width, $max_height)
        ->toFile($dst);
    }
    /**
    * Miniatura da imagem
    * @param  string  $src    Imagem de origem
    * @param  string  $dst    Imagem de destino
    * @param  integer $width  Largura da miniatura
    * @param  integer $height Altura da miniatura
    * @return bool            Retorna true ou false
    */
    public function thumb(string $src, string $dst, integer $width, integer $height):bool
    {
        $anchor='center';
        return $this
        ->image($src)
        ->thumbnail($width, $height, $anchor)
        ->toFile($dst);
    }
}
