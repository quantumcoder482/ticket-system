<?php
Class Sysfile {

    public static function deleteDir($dirPath) {

        if (! is_dir($dirPath)) {
          //  throw new InvalidArgumentException("$dirPath must be a directory");
          return false;
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        if(rmdir($dirPath)){
            return true;
        }
        else{
            return false;
        }
    }

}