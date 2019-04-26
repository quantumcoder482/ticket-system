<?php


Class Image extends Intervention\Image\ImageManagerStatic {

//    public static function fromUrl($source,$storage_path,$size='default'){
//
//    }

}

Image::configure(array('driver' => 'gd'));